<?php

use App\Models\EstadoProcesso;
use App\Models\Manifestacao;
use App\Models\Recurso;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Recurso::class, function (Faker $faker) {
    $estado_processo_recurso = EstadoProcesso::where('nome', 'Recurso')->first();
    $manifestacao = Manifestacao::where('estado_processo_id', $estado_processo_recurso->id)
    ->has('recursos', '<', 1)
    ->inRandomOrder()
    ->first();

    return [
        'recurso' => $faker->text(),
        'resposta' => $faker->text(),
        'manifestacao_id' => $manifestacao->id,
        'data_recurso' => $faker->dateTime(),
        'data_resposta' => $faker->dateTime(),
    ];
});
