<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Approval::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'approved_at' => now(),
    ];
});

$factory->state(App\Models\Approval::class, 'pending', function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'approved_at' => null,
    ];
});
