<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manifestacao;
use App\Models\Situacao;
use App\Models\TipoManifestacao;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function dashboard(Request $request)
    {
        $resumo_situacoes_nomes = [];
        $resumo_stiuacoes_qtd = [];

        $resumo_tipo_manifestacao = [];
        $dataSet = [];

        $resumo_estados_processo_nomes = [];
        $resumo_estados_processo_qtd = [];

        $resumo_manifestacoes_nomes = [];
        $resumo_manifestacoes_qtd = [];


        $manifestacoes_ano = [];
        $manifestacoes_qtd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $situacoes = Manifestacao::with('situacao')->get()->groupBy('situacao_id');

        foreach ($situacoes as $situacao) {
            $resumo_situacoes_nomes[] = $situacao[0]->situacao->nome;
            $resumo_situacoes_qtd[] = $situacao->count();
        }


        foreach (TipoManifestacao::all() as $keyTipo => $tipo) {
            $tipos_manifestacao = Manifestacao::query()
                ->where('tipo_manifestacao_id', $tipo->id)
                ->whereYear('created_at', date('Y'))
                ->orderBy("created_at")
                ->get()
                ->groupBy(function ($val) {
                    return Carbon::parse($val->created_at)->format('n');
                });
            for ($i = 1; $i <= 12; $i++) {
                if (isset($tipos_manifestacao[$i])) {
                    $resumo_tipo_manifestacao[$i - 1] = $tipos_manifestacao[$i]->count();
                } else {
                    $resumo_tipo_manifestacao[$i - 1] = 0;
                }
            }
            $dataSet[] = [
                'label' => $tipo->nome,
                'data' => $resumo_tipo_manifestacao,
                'backgroundColor' => ['rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                ],
                'borderColor' => ['rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
                ],
                'fill' => true,
                'tension' => 0.3,
            ];
        }

        // $tipos_manifestacao = TipoManifestacao::query()->with('manifestacoes')->whereYear('created_at', date('Y'))->get()                                                
        // ->groupBy(function ($val) {
        //       return Carbon::parse($val->created_at)->format('n');
        //       });    

        $dataSet = json_encode($dataSet);
        // dd($dataSet);

        $estados_processo = Manifestacao::with('estadoProcesso')->get()->groupBy('estado_processo_id');
        foreach ($estados_processo as $estado_processo) {
            $resumo_estados_processo_nomes[] = $estado_processo[0]->estadoProcesso->nome;
            $resumo_estados_processo_qtd[] = $estado_processo->count();
        }

        $manifestacoes = Manifestacao::query()->whereYear('created_at', date('Y'))->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('n');
            });

        foreach ($manifestacoes as $key => $manifestacao) {
            $manifestacoes_qtd[$key - 1] = $manifestacao->count();
        }

        // dd($manifestacoes, $manifestacoes_qtd);
        // dd($manifestacoes);

        return view("admin.home", compact('resumo_situacoes_nomes', 'resumo_situacoes_qtd', 'resumo_tipos_manifestacao_nomes', 'resumo_tipos_manifestacao_qtd', 'resumo_estados_processo_nomes', 'resumo_estados_processo_qtd', 'datas', 'manifestacoes_ano', 'manifestacoes_qtd', 'dataSet'));
    }


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
}
