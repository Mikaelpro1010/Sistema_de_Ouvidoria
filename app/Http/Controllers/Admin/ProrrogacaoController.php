<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manifestacao;
use App\Models\Prorrogacao;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ProrrogacaoController extends Controller
{
    public function create(Request $request, $id)
    {
        
        $validacao = [
            'motivo_solicitacao' => 'required|nullable|string',
        ];
        $validator = FacadesValidator::make(
            $request->all(),
            $validacao,
            [
                'motivo_solicitacao.required' => 'É necessário inserir um nome!',
                'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $manifestacao = Manifestacao::find($request->id);

        if ($manifestacao == null) {
            return redirect()
                ->route('visualizar-manifestacao')
                ->withErrors(['Erro'=> 'Manifestacao nao existe']);
        } else{
            $prorrogacao = new Prorrogacao();
            $prorrogacao->motivo_solicitacao = $request->motivo_solicitacao;
            $prorrogacao->user_id = auth()->user()->id;
            $prorrogacao->manifestacao_id = $manifestacao->id;
            $prorrogacao->situacao = Prorrogacao::SITUACAO_ESPERA;
            $prorrogacao->save();
            return redirect()->route('visualizar-manifestacao', $prorrogacao->id)->with('mensagem', 'Pedido de prorrogação realizado com sucesso!');
        }
    }
}
