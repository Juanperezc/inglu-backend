<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'photo' => $faker->imageUrl(),
        'title' => $faker->realText(10),
        'description' => $faker->realText(100),
        'category_id' => rand(1,3),
        'user_id' => 1,
     
    ];
});
