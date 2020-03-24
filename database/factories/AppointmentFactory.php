<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use App\Treatment;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
     
        'medical_staff_id' => rand(1,10),
        'patient_id' => rand(1,10),
        'workspace_id' => rand(1,5),
        'date' => $faker->dateTimeBetween('-1 years','now'),
        'qualification' => rand(0,5),
        'comment' => $faker->realText(200),
        'status' => rand(0,2)
        //
    ];
});

$factory->afterCreating(Appointment::class, function ($row, $faker) {
  
    Treatment::create([
    'description' => $faker->realText(100),
    'medicine' =>  $faker->realText(10),
    'appointment_id' => $row->id]);
 /*    $row->workspaces()->attach(rand(1,5));
    $row->roles()->attach(rand(1,3)); */
});