<?php

use Illuminate\Database\Seeder;
use App\SiteInformation;

class SiteInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        SiteInformation::create([
           'title' => '¿QUÉ ES UN CLUB PARA PERSONAS CON DIABETES?',
           'description' => "Es la organización de los propios pacientes, que bajo la supervisión médica y con el apoyo de los servicios de salud, sirve de escenario para la capacitación necesaria para el control de la diabetes. El club estimula la participación activa e informada del paciente como un elemento indispensable para el autocuidado.",
           'img'  => 'https://ingludiag.blob.core.windows.net/resources/image/portal/img1.jpg',
        

       ]);
    }
}
