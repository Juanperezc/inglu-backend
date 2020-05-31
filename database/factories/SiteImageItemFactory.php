<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteImageItem;
use Faker\Generator as Faker;

$factory->define(SiteImageItem::class, function (Faker $faker) {
    return [
       'img' => 'https://placeimg.com/100/100/any?' . rand(1, 100),
       'description' => $faker->realText(10),
       'site_image_id' => 1,
    ];
});
