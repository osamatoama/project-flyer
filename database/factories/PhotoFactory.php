<?php

use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'flyer_id' => App\Flyer::first()->id,
        'path'     => str_random(5) . '.jpg'
    ];
});
