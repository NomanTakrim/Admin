<?php

use Faker\Generator as Faker;

$factory->define(App\Software::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'version' => $faker->randomDigit,  
    ];
});
