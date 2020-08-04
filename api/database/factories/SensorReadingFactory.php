<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SensorReading;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(SensorReading::class, function (Faker $faker) {
    $types = ['temperature','humidity','methane','co', 'moisture'];
    shuffle($types);

    return [
        'sensor_id' => rand(1,5),
        'reading' => rand(20,100),
        'type' => $types[0],
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
