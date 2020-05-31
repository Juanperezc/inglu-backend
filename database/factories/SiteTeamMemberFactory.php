<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteTeamMember;
use Faker\Generator as Faker;

$factory->define(SiteTeamMember::class, function (Faker $faker) {
    return [
        //
        'img' => 'https://placeimg.com/100/100/any?' . rand(1, 100),
        'name' => $faker->realText(10),
        'role' => $faker->realText(100),
        'site_team_id' => 1,
    ];
});
