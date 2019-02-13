<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Answer::class, function (Faker $faker) {
    return [
        'content_answer' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'correct' => $faker->boolean($chanceOfGettingTrue = 4),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
