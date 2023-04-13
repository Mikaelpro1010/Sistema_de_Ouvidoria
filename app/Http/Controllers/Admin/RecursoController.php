<?php

namespace App\Http\Controllers\Admin;

use App\Models\Recurso;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    public function createResposta(Request $request, $manifestacao_id)
    {
        $resposta = Recurso::find($request->recurso_id);    

        if($resposta->manifestacao_id == $manifestacao_id){
            $resposta->resposta = $request->resposta;
            $resposta->data_resposta = Carbon::now();
            $resposta->save();
            return redirect()->back()->with('mensagem', 'Recurso salvo com sucesso!');
        }

    }
}
