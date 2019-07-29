<?php

use App\Aluno;
use Faker\Generator as Faker;

$factory->define(Aluno::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone_a' => $faker->e164PhoneNumber,
        'phone_b' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->streetAddress,
        // 'turno' => "000.000.000-00",
        // 'turno' => array_random(['ManhĂ£', 'Tarde']),
        'type' => $faker->randomElement(['m', 't']),
    ];
});
