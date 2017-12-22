<?php

use Faker\Generator as Faker;

$factory->define(\App\User::class, function (Faker $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'university_email' => $faker->unique()->safeEmail
    ];
});