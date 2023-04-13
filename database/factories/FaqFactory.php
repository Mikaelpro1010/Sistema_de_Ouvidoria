<?php

use App\Models\Faq;
use Faker\Generator as Faker;

$factory->define(Faq::class, function (Faker $faker) {
    return [
        'ativo'=> true,
        'pergunta'=> $faker-> text(),
        'resposta'=> $faker-> text(),
        'ordem' => -1,
        
    ];
});
