<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_no' =>$faker->unique()->PhoneNumber,
        'user_id' =>$faker->randomDigit,

    ];
});