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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\FlightDetail::class, function (Faker\Generator $faker) {

    return [
            'org_id' => rand(1,2),
            'code' => $faker->unique()->safeEmail,
            'from' => rand(1,4),
            'to' => rand(1,4),
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s',strtotime('+1 hour',strtotime(date('Y-m-d H:i:s')))),
            'price' => rand(2, 999999999),
    ];
});
