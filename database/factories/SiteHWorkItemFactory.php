<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteHWorkItem;
use Faker\Generator as Faker;

$factory->define(SiteHWorkItem::class, function (Faker $faker) {
    return [
        'img' => null,
        'title' => $faker->realText(10),
        'description' => $faker->realText(100),
        'site_h_work_id' => 1,
     ];
});
