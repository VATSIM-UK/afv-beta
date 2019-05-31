<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'name_first' => $faker->firstName,
        'name_last' => $faker->lastName,
        'rating_atc' => $faker->randomElement(['OBS', 'S1', 'S2', 'S3', 'C1']),
        'region' => 'EUR',
        'division' => 'GBR',
        'last_login' => now(),
        'last_login_ip' => $faker->ipv4,
    ];
});
