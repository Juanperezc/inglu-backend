<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\User;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $types = [
        "Actividad fisica",
        "Apoyo psicologico",
        "Integración comunitaria y familiar",
        "Conferencias",
        "Recreación"];
    $names = [
        "Rally familiar",
        "Partido amistodo de basquetbol",
        "Introduccion a la diabetes",
        "Espacio de consejeria abierto a los familiares de diabeticos",
        "Fiesta de Fin de año del club"];
    $locations = [
        "Torre 1, espacio 4",
        "Club campestre los ruiseñores",
        "Torre 2, area común",
        "Area común principal",
        "Torre 1, espacio 2"];
    return [
        'name' => $names[rand(0, 4)],
        'description' => $faker->realText(50),
        'type' =>  $types[rand(0, 4)],
        'location' => $locations[rand(0, 4)],
        'limit' => rand(10,50),
        'picture' => 'https://placeimg.com/800/800/any?' . rand(1, 100),
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
