<?php

use Illuminate\Database\Seeder;
use App\Specialty;
class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialty::create([
        "name" => "Neumología",
        "picture" => null,
        "description" => "La neumología es la especialidad médica encargada del 
        estudio de las enfermedades del aparato respiratorio y centra su campo de 
        actuación en el diagnóstico, tratamiento y prevención de las enfermedades del 
        pulmón, la pleura y el mediastino.",
        ]);
        //
       /*  factory(Workspace::class, 10)->create(); */
    }
}
