<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'address' => $faker->address,
        'phone' => $faker->e164PhoneNumber,
        'last_name' => $faker->lastName,
        'id_card' => $faker->nationalId,
        'date_of_birth' => $faker->dateTimeBetween('-40 years','-18 years'),
        'email' => $faker->unique()->safeEmail,
        'message' => $faker->realText(100),
        'type' => rand(1,2),
        'status' => rand(0,1)
    ];
});
