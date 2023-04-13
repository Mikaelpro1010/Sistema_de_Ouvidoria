<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manifestacao;

class RespostasController extends Controller
{
    public function createRespostas(Request $request, $manifestacao_id){
        $manifestacao = Manifestacao::find($request->manifestacao_id);
        if($manifestacao->id==$manifestacao_id){
            $manifestacao->contextualizacao = $request->contextualizacao;
            $manifestacao->providencia_adotada = $request->providencia_adotada;
            $manifestacao->conclusao = $request->conclusao;
            $manifestacao->save();
            return redirect()->back()->with('mensagem', 'Respostas salvas com sucesso!');
        }
    }
}
