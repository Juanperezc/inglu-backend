<?php

use Illuminate\Database\Seeder;
use App\Appointment;
class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Appointment::class, 10)->create();
    }
}
