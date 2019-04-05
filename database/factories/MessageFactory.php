<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Message::class, function (Faker $faker) {
    return [
        'email'=> $faker->email,
        'texte'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'ad_id'=>rand(1,10),
    ];
});
