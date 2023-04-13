<?php

use App\Models\Manifestacao;
use App\Models\Prorrogacao;
use App\Models\Situacao;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Prorrogacao::class, function (Faker $faker) {
    $prorrogacao = [
        'motivo_solicitacao'=> $faker-> text(),
        'manifestacao_id'=> Manifestacao::inRandomOrder()->first()->id,
        'user_id'=> User::inRandomOrder()->first()->id,
        'situacao' => Prorrogacao::SITUACAO_ESPERA,
    ];

    return $prorrogacao;
});
