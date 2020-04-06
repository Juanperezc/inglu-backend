<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
       $juan =  User::create([
        'name' => "Juan",
        'date_of_birth' => now(),
        'last_name' => "Perez",
        'id_card' => "V25141826",
        'email' => "juanl1996@hotmail.com",
        'password' => '2514182657',
        'phone' => '04245869872',
        'address' => "Carrera 10 entre 13 y 15"
       ]);
       $juan->roles()->attach(1);
    }
}
