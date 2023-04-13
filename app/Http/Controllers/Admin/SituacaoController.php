<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Situacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SituacaoController extends Controller
{
    public function listar()
    {
        $situacoes = Situacao::query()
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

        return view('admin.situacao.listar-situacao', ['situacoes' => $situacoes]);
    }

    public function visualizarCadastro()
    {
        return view('admin.situacao.vis-cadastro-situacao');
    }

    public function cadastrarSituacao(Request $request)
    {
        $validator = Validator::make(
            $request->only(['nome','descricao']),
            [
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string',
            ],
            [
                'nome.required' => 'É necessário inserir um nome!',
                'descricao.required' => 'É necessário inserir um texto!',
                'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $situacao = new Situacao();

        $situacao->ativo = true;
        $situacao->nome = $request->nome;
        $situacao->descricao = $request->descricao;

        $situacao->save();

        return redirect()->route('listagem-situacao');
    }

    public function visualizarSituacao($id)
    {
        $situacao = Situacao::find($id);

        return view('admin.situacao.visualizar-situacao', ['situacao' => $situacao]);
    }

    public function editarSituacao($id)
    {
        $situacao = Situacao::find($id);
        return view('admin.situacao.editar-situacao', ['situacao' => $situacao]);
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

        $situacao = Situacao::find($id);

        $situacao->nome = $request->nome;
        $situacao->descricao = $request->descricao;
        $situacao->save();

        return redirect()->route('listagem-situacao', $situacao->id)->with('mensagem', 'Atualizado com sucesso!');
    }

    public function deletarSituacao(Request $request)
    {
        $situacao = Situacao::find($request->id);
        $situacao->delete();
        return redirect()->route('listagem-situacao')->with('mensagem', 'Deletado com sucesso!');
    }

    public function ativareDesativar($id)
    {
        $situacao = Situacao::find($id);
        $situacao->ativo = !$situacao->ativo;
        $situacao->save();

        return redirect()->route('listagem-situacao');
    }
}
