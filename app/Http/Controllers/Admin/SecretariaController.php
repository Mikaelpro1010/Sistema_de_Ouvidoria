<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Secretarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SecretariaController extends Controller
{
    public function listar(){
        $secretarias = Secretarias::query()
            ->when(request()->pesquisa, function($query){
                $query->where('nome', 'like', "%". request()->pesquisa."%")
                ->orWhere('sigla', 'like', "%". request()->pesquisa."%");
            })  
            ->orderBy('ativo', 'desc')
            ->orderBy('updated_at', 'desc')
            ->paginate(10)
            ->appends(
                ['pesquisa'=>request()->pesquisa]
            );
    
        return view('admin.secretarias.listar-secretarias', ['secretarias' => $secretarias]);
    }

    public function visualizarCadastro()
    {
        return view('admin.secretarias.vis-cadastro-secretarias');
    }

    public function cadastrarSecretaria(Request $request)
    {
        $secretaria = new Secretarias();

        $secretaria->ativo = true;
        $secretaria->nome = $request->nome;
        $secretaria->sigla = $request->sigla;

        $secretaria->save();

        return redirect()->route('listagem-secretarias');
    }

    public function visualizarSecretaria($id)
    {
        $secretaria = Secretarias::find($id);

        return view('admin.secretarias.visualizar-secretarias', ['secretaria' => $secretaria]);
    }

    public function editarSecretaria($id)
    {
        $secretaria = Secretarias::find($id);
        return view('admin.secretarias.editar-secretarias', ['secretaria' => $secretaria]);
    }

    public function atualizar(Request $request, $id)
    {
        $validator = Validator::make(
            $request->only(['nome','sigla']),
            [
                'nome' => 'required|string|max:255',
                'sigla' => 'required|string|max:255',
            ],
            [
                'required.nome' => 'É necessário possuir um nome para ser editado!',
                'required.sigla' => 'É necessário possuir uma sigla para ser editado!',
                'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $secretaria = Secretarias::find($id);

        $secretaria->nome = $request->nome;
        $secretaria->sigla = $request->sigla;
        $secretaria->save();

        return redirect()->route('listagem-secretarias', $secretaria->id)->with('mensagem', 'Atualizado com sucesso!');
    }

    public function deletarSecretaria(Request $request)
    {
        $secretaria = Secretarias::find($request->id);
        $secretaria->delete();
        return redirect()->route('listagem-secretarias')->with('mensagem', 'Deletado com sucesso!');
    }

    public function ativareDesativar($id)
    {
        $secretarias = Secretarias::find($id);
        $secretarias->ativo = !$secretarias->ativo;
        $secretarias->save();

        return redirect()->route('listagem-secretarias');
    }

    public function selecionarSecretaria($id){
        $secretarias = Secretarias::find($id);

        return view('admin.manifestacao.visualizar-manifestacao', ['secretarias' => $secretarias]);
    }
}
