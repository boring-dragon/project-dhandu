<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sensor;
use Faker\Generator as Faker;

$factory->define(Sensor::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'type' => $faker->word,
        'description' => $faker->paragraph
    ];
});
