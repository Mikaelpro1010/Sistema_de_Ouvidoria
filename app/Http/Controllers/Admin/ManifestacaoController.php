<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EstadoProcesso;
use App\Models\Manifestacao;
use App\Models\Motivacao;
use App\Models\Situacao;
use App\Models\TipoManifestacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\Secretarias;
use Illuminate\Support\Facades\Storage;

class ManifestacaoController extends Controller
{
    public function listar()
    {
        $manifestacoes = Manifestacao::query()
            ->with('estadoProcesso')
            ->when(request()->pesquisa, function ($query) {
                $query->where('senha', 'like', "%" . request()->pesquisa . "%")
                    ->orWhere('protocolo', 'like', "%" . request()->pesquisa . "%");
            })
            ->orderBy('updated_at', 'desc')

            ->paginate(10)
            ->appends(
                ['pesquisa' => request()->pesquisa]
            );
        return view('admin.manifestacao.listar-manifestacao', ['manifestacoes' => $manifestacoes]);
    }

    public function visualizarManifestacao($id)
    {
        $secretarias = Secretarias::get();
        $manifestacao = Manifestacao::query()->with('prorrogacao', 'prorrogacao.user', 'recursos')->find($id);
        
        return view('admin.manifestacao.visualizar-manifestacao', compact('manifestacao', 'secretarias'));
    }

    public function visualizarCadastro()
    {
        $tipos_manifestacao = TipoManifestacao::where('ativo', true)->get();

        $situacoes = Situacao::where('ativo', true)->get();

        $estados_processo = EstadoProcesso::where('ativo', true)->get();

        $motivacoes = Motivacao::where('ativo', true)->get();
        return view('admin.manifestacao.vis-cadastro-manifestacao', compact('tipos_manifestacao', 'situacoes', 'estados_processo', 'motivacoes'));
    }

    public function cadastrarManifestacao(Request $request)
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
                'situacoes' => 'required|integer',
                'estados_processo' => 'required|integer',
                'motivacoes' => 'required|integer',
            ];
        } else {
            $validacao = [
                'endereco' => 'required|nullable|string',
                'bairro' => 'required|nullable|string',
                'manifestacao' => 'required|nullable|string',
            ];
        }

        $validator = FacadesValidator::make(
            $request->all(),
            $validacao,
            [
                'nome.required' => 'É necessário inserir um nome!',
                'email.required' => 'É necessário inserir um email!',
                'numero_telefone.required' => 'É necessário inserir um numero de telefone!',
                'endereco.required' => 'É necessário inserir um endereço!',
                'bairro.required' => 'É necessário inserir um bairro!',
                'tipos_manifestacao.required' => 'É necessário selecionar um tipo de manifestação!',
                'situaceos.required' => 'É necessário selecionar uma situacao!',
                'estados_processo.required' => 'É necessário selecionar um estado-processo!',
                'motivacoes.required' => 'É necessário selecionar uma motivação!',
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
        do {
            $new_protocolo = random_int(10000, 99999);
            $new_senha = random_int(10000, 99999);

            $manifestacao = Manifestacao::where('protocolo', $new_protocolo)->orWhere('senha', $new_senha)->first();
        } while (!is_null($manifestacao));

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
        $manifestacao->situacao_id = $request->situacao;
        $manifestacao->estado_processo_id = $request->estado_processo;
        $manifestacao->motivacao_id = $request->motivacao;

        if($request->has('anexo')){
            foreach($request->file('anexo') as $file){
                $uploadedFile = $file;
                $filename = time(). $uploadedFile->getClientOriginalName();
                // $caminho = ;

                Storage::disk('local')->putFileAs(
                    // $caminho,
                    $uploadedFile,
                    $filename
                );

            };
        }


        $manifestacao->save();

        return redirect()->route('listagem-manifestacao')->with('mensagem', 'Usuario cadastrado com sucesso');
    }

    public function create(Request $request)
    {
        $manifestacao = Manifestacao::find($request->id);
        $manifestacao->save();
        return redirect()->route('visualizar-manifestacao');
    }
}
