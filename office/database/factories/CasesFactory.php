<?php

use Faker\Generator as Faker;

$factory->define(App\Cases::class, function (Faker $faker) {
    return [
        'software' => $faker->name,
        'problem' => $faker->word,
        'solution'=>$faker->word,
        'remark'=>$faker->word,
        'solved'=>1,
        'customer_id'=>5,
        'user_id' =>$faker->randomDigit,

    ];
});