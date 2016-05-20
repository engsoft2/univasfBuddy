<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$factory = app('Illuminate\Database\Eloquent\Factory');

$factory->define(App\Rota::class, function (Faker\Generator $faker) {
    return [
        'via' => $faker->name,
        'onibus' => str_random(1),
        'motorista' => $faker->number,
    ];
});

$factory->define(App\Ponto::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
    ];
});


