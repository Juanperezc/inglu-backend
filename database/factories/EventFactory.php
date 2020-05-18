<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\User;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(15),
        'description' => $faker->realText(50),
        'type' =>  $faker->realText(15),
        'location' => $faker->realText(30),
        'limit' => rand(10,50),
        'picture' => 'https://placeimg.com/100/100/any?' . rand(1, 100),
        'date' => $faker->dateTimeBetween('-30 days','+30 days'),
        'status'  => rand(1,2)
    ];
});

$factory->afterCreating(Event::class, function ($row, $faker) {
    //$page->comments()->save($comment);
/*     $time = UserWorkspaceTime::make([
        'start_time' => '18:00',
         'end_time' => '20:00',
          'day' => 'Monday',
    ]); */
    $doctor = User::where('type', 2)->inRandomOrder()->first();
    $patients = User::where('type', 1)->inRandomOrder()->limit(5)->get();


    $row->users()->attach($patients->pluck('id'));
    $row->doctor_id = $doctor->id;
    $row->save();

});
