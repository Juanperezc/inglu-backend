<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(15),
        'description' => $faker->realText(50),
        'type' =>  $faker->realText(15),
        'location' => $faker->realText(30),
        'limit' => rand(10,50),
        'picture' => 'https://placeimg.com/100/100/any?' . rand(1, 100),
        'date' => $faker->dateTimeBetween('-40 years','-18 years'),
        'status'  => rand(1,2)
    ];
});
