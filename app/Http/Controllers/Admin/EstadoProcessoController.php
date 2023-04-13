<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EstadoProcesso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstadoProcessoController extends Controller
{
    public function listar()
    {
        $estado_processos = EstadoProcesso::query()
            ->when(request()->pesquisa, function($query){
                $query->where('nome', 'like', "%". request()->pesquisa."%")
                ->orWhere('descricao', 'like', "%". request()->pesquisa."%");
            })  
            ->orderBy('ativo', 'desc')
            ->orderBy('updated_at', 'desc')
            ->paginate(10)
            ->appends(
                ['pesquisa'=>request()->pesquisa]
            );

        return view('admin.estado_processo.listar-estado_processo', ['estado_processos' => $estado_processos]);
    }

    public function visualizarCadastro()
    {
        return view('admin.estado_processo.vis-cadastro-estado_processo');
    }

    public function cadastrarEstadoProcesso(Request $request)
    {
        $validator = Validator::make(
            $request->only(['nome', 'descricao']),
            [
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string',
            ],
            [
                'nome.required' => 'É necessário inserir um nome!',
                'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $estado_processo = new EstadoProcesso();

        $estado_processo->ativo = true;
        $estado_processo->nome = $request->nome;
        $estado_processo->descricao = $request->descricao;

        $estado_processo->save();

        return redirect()->route('listagem-estado_processo');
    }

    public function visualizarEstadoProcesso($id)
    {
        $estado_processo = EstadoProcesso::find($id);

        return view('admin.estado_processo.visualizar-estado_processo', ['estado_processo' => $estado_processo]);
    }

    public function editarEstadoProcesso($id)
    {
        $estado_processo = EstadoProcesso::find($id);
        return view('admin.estado_processo.editar-estado_processo', ['estado_processo' => $estado_processo]);
    }

    public function atualizar(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string',
            ],
            [
                'nome.required' => 'É necessário possuir um nome para ser editado!',
                'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $estado_processo = EstadoProcesso::find($id);

        $estado_processo->nome = $request->nome;
        $estado_processo->descricao = $request->descricao;
        $estado_processo->save();

        return redirect()->route('listagem-estado_processo', $estado_processo->id)->with('mensagem', 'Atualizado com sucesso!');
    }

    public function deletarEstadoProcesso(Request $request)
    {
        $estado_processo = EstadoProcesso::find($request->id);
        $estado_processo->delete();
        return redirect()->route('listagem-estado_processo')->with('mensagem', 'Deletado com sucesso!');
    }

    public function ativareDesativar($id)
    {
        $estado_processos = EstadoProcesso::find($id);
        $estado_processos->ativo = !$estado_processos->ativo;
        $estado_processos->save();

        return redirect()->route('listagem-estado_processo');
    }
}
