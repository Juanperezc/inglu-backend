<?php

use Illuminate\Database\Seeder;
use App\Event;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $types = [
            "Actividad fisica",
            "Apoyo psicologico",
            "Integración comunitaria y familiar",
            "Conferencias",
            "Recreación"];
        
        Event::create([
            'name' => "Clase grupal de Yoga",
            'description' => "Sistema de práctica que combina postura,
            respiración, movimiento y meditación. Clase grupal donde los practicantes son guiados de manera individual.",
            'type' =>  $types[1],
            'location' => "Parque del este",
            'limit' => rand(10,50),
            'picture' => 'https://ingludiag.blob.core.windows.net/resources/image/event/yoga.jpg',
            'date' => Carbon::now()->addDays(30),
            'status'  => rand(1,2)
        ]);
        Event::create([
            'name' => "¿Que es el coronavirus?",
            'description' => "Ponencias de epidemiologos, abiertas al publico para
             dar a conocer los detalles mas importantes del virus",
            'type' =>  $types[3],
            'location' => "Ascardio",
            'limit' => rand(10,50),
            'picture' => 'https://ingludiag.blob.core.windows.net/resources/image/event/ponencia.png',
            'date' => Carbon::now()->addDays(30),
            'status'  => rand(1,2)
        ]);
        Event::create([
            'name' => "Entrenamiento de ciclismo",
            'description' => "Entrenamiento donde buscamos mejorar tu bienestar fisico a traves del ciclismo",
            'type' =>  $types[1],
            'location' => "Cerro la catalina",
            'limit' => rand(10,50),
            'picture' => 'https://ingludiag.blob.core.windows.net/resources/image/event/ciclismo.jpg',
            'date' => Carbon::now()->addDays(30),
            'status'  => rand(1,2)
        ]);
        factory(Event::class, 3)->create();
    }
}
