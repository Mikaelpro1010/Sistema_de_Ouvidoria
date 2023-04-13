<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\EstadoProcesso;
use App\Models\Manifestacao;
use App\Models\Motivacao;
use App\Models\Situacao;
use App\Models\TipoManifestacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaginaManifestacaoController extends Controller
{
    public function visualizarPagina()
    {
        $tipos_manifestacao = TipoManifestacao::where('ativo', true)->get();
        return view('Publico.pagina-manifestacao', ['tipos_manifestacao' => $tipos_manifestacao]);
    }

    public function cadastrar(Request $request)
    {
        if ($request->anonimo == 0) {
            $validacao = [
                'nome' => 'required|string|max:255',
                'email' => 'required|nullable|string',
                'numero_telefone' => 'required|nullable|string',
                'endereco' => 'required|nullable|string',
                'bairro' => 'required|nullable|string',
                'manifestacao' => 'required|nullable|string',
                'tipos_manifestacao' => 'required|integer',

            ];
        } else {
            $validacao = [
                'endereco' => 'required|nullable|string',
                'bairro' => 'required|nullable|string',
                'manifestacao' => 'required|nullable|string',
            ];
        }

        $validator = Validator::make(
            $request->all(),
            $validacao,
            [
                'nome.required' => 'É necessário inserir um nome!',
                'tipos_manifestacao.required' => 'É necessário selecionar um tipo de manifestacao!',
                'email.required' => 'É necessário inserir um email!',
                'numero_telefone.required' => 'É necessário inserir um numero de telefone!',
                'endereco.required' => 'É necessário inserir um endereço!',
                'bairro.required' => 'É necessário inserir um bairro!',
                'manifestacao.required' => 'É necessário inserir uma manifestação!',
                'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',

            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
  
        do{ 
            $new_protocolo = random_int(10000, 99999);
            $new_senha = random_int(10000, 99999);
            
            $manifestacao = Manifestacao::where('protocolo', $new_protocolo)->orWhere('senha', $new_senha)->first();
        }while(!is_null($manifestacao));
        
        $manifestacao = new Manifestacao();
        $manifestacao->protocolo = $new_protocolo;
        $manifestacao->senha = $new_senha;
        $manifestacao->nome = $request->nome;
        $manifestacao->anonimo = $request->anonimo;
        $manifestacao->email = $request->email;
        $manifestacao->numero_telefone = $request->numero_telefone;
        $manifestacao->tipo_telefone = $request->tipo_telefone;
        $manifestacao->endereco = $request->endereco;
        $manifestacao->bairro = $request->bairro;
        $manifestacao->tipo_manifestacao_id = $request->tipo_manifestacao;
        $manifestacao->manifestacao = $request->manifestacao;
        $manifestacao->situacao_id = Situacao::where('nome', 'Aberta')->first()->id;
        $manifestacao->estado_processo_id = EstadoProcesso::where('nome', 'Inicial')->first()->id;
        $manifestacao->motivacao_id = Motivacao::where('nome', 'Manifestação')->first()->id;


        $manifestacao->save();

        return redirect()->route('home')->with('mensagem','Usuário cadastrado com sucesso!');
    }

    public function visualizarManifestacao(Request $request){
        $validator = Validator::make(
            $request->only(['protocolo', 'senha']),
            [
                'protocolo' => 'required|digits:5',
                'senha' => 'required|digits:5',
            ],
            [
                'protocolo.required' => 'É necessário inserir um numero de protocolo!',
                'senha.required' => 'É necessário inserir uma senha!',
                'protocolo.digits' => 'O protocolo possui um limite de 5 digitos!',
                'senha.digits' => 'A senha possui um limite de 5 digitos!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $manifestacao = Manifestacao::where('protocolo', $request->protocolo)->where('senha', $request->senha)->first();

        if(is_null($manifestacao)){
            return redirect()->back()->withErrors(['error'=>'não foi possível encontrar essa manifestação!']);
        } else{
            return view('Publico.vis-manifestacao',  ['manifestacao' => $manifestacao]);
        }
        
    }
}
