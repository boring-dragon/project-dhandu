<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Threshold;
use Faker\Generator as Faker;

$factory->define(Threshold::class, function (Faker $faker) {

    return [
        'limit' => $faker->randomDigitNotNull,
        'type' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
