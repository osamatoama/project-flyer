<?php

use Faker\Generator as Faker;

$factory->define(App\Flyer::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'street' => $faker->streetName,
        'city'   => $faker->city,
        'zip'   =>  $faker->postcode,
        'state'  => $faker->state,
        'country' => $faker->country,
        'price'  => $faker->numberBetween(10000, 500000),
        'description' => $faker->paragraph(3)
    ];
});
