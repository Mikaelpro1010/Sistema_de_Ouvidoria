<?php

use App\Models\EstadoProcesso;
use App\Models\Manifestacao;
use App\Models\Motivacao;
use App\Models\Situacao;
use App\Models\TipoManifestacao;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Manifestacao::class, function (Faker $faker) {
    $valor = random_int(1, 2);
    $anonimo = random_int(1,5) % 5 == 0 ? true : false;
    $situacao = Situacao::inRandomOrder()->first();
    $estado_processo = EstadoProcesso::inRandomOrder()->first();
    $motivacao = Motivacao::inRandomOrder()->first();
    $tipo_manifestacao = TipoManifestacao::inRandomOrder()->first();
    $tipo_telefone = random_int(0,2);

    $vetor_tipo_telefone = ['Cel', 'Fixo', 'Whatsapp'];


    if ($valor == 1) {
        $genero = 'male';
    }

    if ($valor == 2) {
        $genero = 'female';
    }

    $resposta = [
        'protocolo'=> $faker-> unique()->numberBetween(10000, 99999),
        'senha'=> $faker-> unique()->numberBetween(10000, 99999),
        'manifestacao'=> $faker-> text(),
        'contextualizacao'=> $faker-> text(),
        'providencia_adotada'=> $faker-> text(),
        'conclusao'=> $faker-> text(),
        'created_at' => $faker->dateTimeThisYear(),
    ];

    if($situacao->id == 8){ //cocnluido
        $resposta['data_finalizacao'] = Carbon::now();
    }

    $resposta['situacao_id'] = $situacao->id;

    $resposta['estado_processo_id'] = $estado_processo->id;

    $resposta['motivacao_id'] = $motivacao->id;

    $resposta['tipo_manifestacao_id'] = $tipo_manifestacao->id;

    if($anonimo){
        $resposta['anonimo']= $anonimo;
    }else{
        $resposta['nome'] = $faker->name($genero);
        $resposta['email'] = $faker-> email();
        $resposta['numero_telefone'] = $faker-> phoneNumber();
        $resposta['tipo_telefone'] = $vetor_tipo_telefone[$tipo_telefone];
        $resposta['endereco'] = $faker-> address();
        $resposta['bairro'] = $faker-> streetName();
            
    }
    return $resposta;
});

