<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoManifestacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoManifestacaoController extends Controller
{
    public function listar()
    {
        $tipo_manifestacoes = TipoManifestacao::query()
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

        return view('admin.tipo_manifestacao.listar-tipo_manifestacao', ['tipo_manifestacoes' => $tipo_manifestacoes]);
    }

    public function visualizarCadastro()
    {
        return view('admin.tipo_manifestacao.vis-cadastro-tipo_manifestacao');
    }

    public function cadastrarTipoManifestacao(Request $request)
    {
        $validator = Validator::make(
            $request->only(['nome','descricao']),
            [
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string',
            ],
            [
                'required' => 'É necessário inserir um nome!',
                'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $tipo_manifestacao = new TipoManifestacao();

        $tipo_manifestacao->ativo = true;
        $tipo_manifestacao->nome = $request->nome;
        $tipo_manifestacao->descricao = $request->descricao;

        $tipo_manifestacao->save();

        return redirect()->route('listagem-tipo_manifestacao');
    }

    public function visualizarTipoManifestacao($id)
    {
        $tipo_manifestacao = TipoManifestacao::find($id);

        return view('admin.tipo_manifestacao.visualizar-tipo_manifestacao', ['tipo_manifestacao' => $tipo_manifestacao]);
    }

    public function editarTipoManifestacao($id)
    {
        $tipo_manifestacao = TipoManifestacao::find($id);
        return view('admin.tipo_manifestacao.editar-tipo_manifestacao', ['tipo_manifestacao' => $tipo_manifestacao]);
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

        $tipo_manifestacao = TipoManifestacao::find($id);

        $tipo_manifestacao->nome = $request->nome;
        $tipo_manifestacao->descricao = $request->descricao;
        $tipo_manifestacao->save();

        return redirect()->route('listagem-tipo_manifestacao', $tipo_manifestacao->id)->with('mensagem', 'Atualizado com sucesso!');
    }

    public function deletarTipoManifestacao(Request $request)
    {
        $tipo_manifestacao = TipoManifestacao::find($request->id);
        $tipo_manifestacao->delete();
        return redirect()->route('listagem-tipo_manifestacao')->with('mensagem', 'Deletado com sucesso!');
    }

    public function ativareDesativar($id)
    {
        $tipo_manifestacao = TipoManifestacao::find($id);
        $tipo_manifestacao->ativo = !$tipo_manifestacao->ativo;
        $tipo_manifestacao->save();

        return redirect()->route('listagem-tipo_manifestacao');
    }
}
