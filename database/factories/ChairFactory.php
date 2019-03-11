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
$factory->define(App\SeatType::class, function (Faker\Generator $faker) {
	$a = 0;
    return [
            'flight_detail_id' => rand(1,2),
            'seat_type_id' => $a++,
            'total' => rand(1,100),
    ];
});
