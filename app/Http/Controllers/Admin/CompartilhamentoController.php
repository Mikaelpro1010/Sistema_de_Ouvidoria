<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Compartilhamento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CompartilhamentoController extends Controller
{
    public function compartilharManifestacao(Request $request, $id){
        $compartilhamento = new Compartilhamento;
    
        $validator = Validator::make(
            $request->only(['secretaria_id', 'texto_compartilhamento']),
            [
                'secretaria_id' => 'required|integer',
                'texto_compartilhamento' => 'required|string|max:255',
            ],
            [
                'secretaria_id.required' => 'É necessário selecionar uma secretaria!',
                'texto_compartilhamento.required' => 'É necessário inserir um texto!',
                'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $compartilhamento->secretaria_id = $request->secretaria_id;
        $compartilhamento->manifestacao_id = $id;
        $compartilhamento->texto_compartilhamento = $request->texto_compartilhamento;
        $compartilhamento->data_inicial = Carbon::now();

        $compartilhamento->save();

        return redirect()->back()->with('mensagem', 'Manifestacao compartilhada com sucesso!');
    }
}
