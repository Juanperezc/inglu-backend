<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use App\Treatment;
use App\User;
use App\UserWorkspace;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    $doctor = User::where('type', 2)->inRandomOrder()->first();
    $patient = User::where('type', 1)->inRandomOrder()->first();
    $workspace = UserWorkspace::where('user_id', $doctor->id)->inRandomOrder()->first();
 /*    dd($workspace->id); */
    $status = rand(0,3);
    return [
        'medical_staff_id' => $doctor->id,
        'patient_id' => $patient->id,
        'user_workspace_id' => $workspace ? $workspace->id : null,
        'date' => $faker->dateTimeBetween('-30 days','now'),
        'qualification' => rand(0,5),
        'condition' => $faker->realText(10),
        'comment' => ($status == 3) ? $faker->realText(200) : null,
        'status' => $status
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