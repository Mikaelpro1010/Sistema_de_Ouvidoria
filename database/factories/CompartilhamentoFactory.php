<?php

use App\Models\Manifestacao;
use App\Models\Secretarias;
use Faker\Generator as Faker;

$factory->define(App\Compartilhamento::class, function (Faker $faker) {
    return [
        'manifestacao_id'=> Manifestacao::inRandomOrder()->first()->id,
        'secretaria_id'=> Secretarias::inRandomOrder()->first()->id,
        'texto_compartilhamento'=> $faker->text(),
        'resposta'=> $faker->text(),
        'data_inicial'=> $faker->dateTime(),
        'data_resposta'=> $faker->dateTime(),
    ];
});
