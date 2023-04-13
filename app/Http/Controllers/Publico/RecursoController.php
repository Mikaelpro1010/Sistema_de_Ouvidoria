<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Manifestacao;
use App\Models\Recurso;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    public function createRecurso(Request $request)
    {
        $manifestacao = Manifestacao::find($request->manifestacao_id);
        if ($request->manifestacao_id == $manifestacao->id) {
            $recurso = new Recurso;
            $recurso->recurso = $request->recurso;
            $recurso->resposta = $request->resposta;
            $recurso->data_recurso = Carbon::now();
            $recurso->data_resposta = $request->data_resposta;
            $recurso->manifestacao_id = $request->manifestacao_id;
            $recurso->save();
            return redirect()->route('pagina-inicial')->with('mensagem', 'Recurso salvo com sucesso!');
        }
    }
}
