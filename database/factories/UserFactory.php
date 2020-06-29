<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\MedicalRecord;
use App\UserWorkspace;
use App\UserWorkspaceTime;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'id_card' => $faker->nationalId,
        'address' => $faker->address,
        'profile_pic' => 'https://placeimg.com/100/100/any?' . rand(1, 100),
        'phone' => $faker->e164PhoneNumber,
        'type' => rand(1,2), //3 es lead
        'date_of_birth' => $faker->dateTimeBetween('-40 years','-18 years'),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
//* after creating

$factory->afterCreating(User::class, function ($row, $faker) {
    $rand_attach = rand(1,1);
     $row->workspaces()->attach($rand_attach,['location' => $faker->realText(10)]);
    
    $user_workspace = UserWorkspace::where(['user_id' => $row->id, 'specialty_id' => $rand_attach])->first();
  
    $time = UserWorkspaceTime::create([
        'start_time' => '18:00',
         'end_time' => '20:00',
          'day' => 'Monday',
          'user_workspace_id' => $user_workspace->id
    ]);
 
   /*  $row->save(); */
    //! role
  /*   $role = rand(1,4); */
    
    if ($row->type == 1){
        $role = 4;
//patient
    }else if ($row->type == 2){
        $role = 2;
//doctor
    }
    $row->roles()->attach($role);
    //$row->claims()->attach(rand(1,3),['text' => $faker->realText(20),
    //'status' => rand(0,1)]);
    //$row->suggestions()->attach(rand(1,3),['text' => $faker->realText(20),
    //'status' => rand(0,1)]);
    $blood_types = [
        "A+",
        "A-",
        "B+",
        "B-",
        "AB+",
        "AB-",
        "OB+",
        "OB-"];

    //* Cambios
    if (/* $role != 4 */ $row->type == 1){
        MedicalRecord::create([
            "blood_type" => $blood_types[rand(0,7)],
            "patient_status" => $faker->realText(20),
            "pathologies" => $faker->realText(20),
            "treatments" => $faker->realText(80),
            "record" => $faker->realText(40),
            "user_id" => $row->id
        ]);
    }
   
});

$factory->afterCreating(UserWorkspace::class, function ($row, $faker) {
    //$page->comments()->save($comment);
    $time = UserWorkspaceTime::make([
        'start_time' => '18:00',
         'end_time' => '20:00',
          'day' => 'Monday',
    ]);
    $row->times()->save($time);
});

    