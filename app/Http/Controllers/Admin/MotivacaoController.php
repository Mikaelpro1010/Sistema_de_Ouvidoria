<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motivacao;
use Illuminate\Support\Facades\Validator;

class MotivacaoController extends Controller
{
    public function listar(){
        $motivacoes = Motivacao::query()
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
    
        return view('admin.motivacao.listar-motivacao', ['motivacoes' => $motivacoes]);
    }

    public function visualizarCadastro()
    {
        return view('admin.motivacao.vis-cadastro-motivacao');
    }

    public function cadastrarMotivacao(Request $request)
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

        $motivacao = new Motivacao();

        $motivacao->ativo = true;
        $motivacao->nome = $request->nome;
        $motivacao->descricao = $request->descricao;

        $motivacao->save();

        return redirect()->route('listagem-motivacao');
    }

    public function visualizarMotivacao($id)
    {
        $motivacao = Motivacao::find($id);

        return view('admin.motivacao.visualizar-motivacao', ['motivacao' => $motivacao]);
    }

    public function editarMotivacao($id)
    {
        $motivacao = Motivacao::find($id);
        return view('admin.motivacao.editar-motivacao', ['motivacao' => $motivacao]);
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


        $motivacao = Motivacao::find($id);

        $motivacao->nome = $request->nome;
        $motivacao->descricao = $request->descricao;
        $motivacao->save();

        return redirect()->route('listagem-motivacao', $motivacao->id)->with('mensagem', 'Atualizado com sucesso!');
    }

    public function deletarMotivacao(Request $request)
    {
        $motivacao = Motivacao::find($request->id);
        $motivacao->delete();
        return redirect()->route('listagem-motivacao')->with('mensagem', 'Deletado com sucesso!');
    }

    public function ativareDesativar($id)
    {
        $motivacoes = Motivacao::find($id);
        $motivacoes->ativo = !$motivacoes->ativo;
        $motivacoes->save();

        return redirect()->route('listagem-motivacao');
    }
}
