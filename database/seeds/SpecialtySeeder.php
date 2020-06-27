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
            "name" => "Cardiología",
            "picture" => "https://ingludiag.blob.core.windows.net/resources/image/specialty/cardiologia.png",
            "description" => "La cardiología es la rama de la medicina que se encarga del estudio,
             diagnóstico y tratamiento de las enfermedades del corazón y del aparato circulatorio.",
        ]);
        Specialty::create([
            "name" => "Endocrinología",
            "picture" => "https://ingludiag.blob.core.windows.net/resources/image/specialty/endocrinologia.png",
            "description" => "La Endocrinología es una disciplina de la medicina que estudia el
             sistema endocrino y las enfermedades provocadas por un funcionamiento inadecuado del mismo.",
        ]);
        Specialty::create([
            "name" => "Nutricionista",
            "picture" => "https://ingludiag.blob.core.windows.net/resources/image/specialty/nutricionista.jpg",
            "description" => "El nutricionista es un profesional sanitario experto en alimentación,
             nutrición y dietética. Se encarga principalmente del diagnóstico nutricional-dietético
             general y específico, así como del tratamiento nutricional-dietético de enfermedades, como por ejemplo la
             diabetes",
        ]);
        Specialty::create([
            "name" => "Podología",
            "picture" => "https://ingludiag.blob.core.windows.net/resources/image/specialty/podologia.jpeg",
            "description" => "La podología es una rama de la medicina que tiene por objeto el estudio,
             diagnóstico y tratamiento de las enfermedades y alteraciones que afectan el pie.",
        ]);
        Specialty::create([
            "name" => "Nefrología",
            "picture" => "https://ingludiag.blob.core.windows.net/resources/image/specialty/nefrologia.png",
            "description" => "La nefrología es la especialidad médica rama de la medicina interna
            que se ocupa del estudio de la estructura y la función renal, tanto en la salud como
            en la enfermedad, incluyendo la prevención y tratamiento de las enfermedades renales.",
        ]);
        Specialty::create([
            "name" => "Gastroenterología",
            "picture" => "https://ingludiag.blob.core.windows.net/resources/image/specialty/gastroenterologia.jpg",
            "description" => "La gastroenterología es la especialidad médica que se ocupa
             de las enfermedades del aparato digestivo y órganos asociados, conformado por:
             esófago, estómago, hígado y vías biliares, páncreas, intestino delgado (duodeno, yeyuno, íleon), colon y recto.",
        ]);
        Specialty::create([
            "name" => "Odontología",
            "picture" => "https://ingludiag.blob.core.windows.net/resources/image/specialty/odontologia.jpg",
            "description" => "La odontología es una de las ciencias de la salud que se encarga
             del diagnóstico, tratamiento y prevención de las enfermedades del aparato estomatognático,
             el cual incluye además de los dientes, las encías, el tejido periodontal, el maxilar superior, el maxilar inferior y la articulación temporomandibular..",
        ]);
        Specialty::create([
            "name" => "Neumología",
            "picture" => "https://ingludiag.blob.core.windows.net/resources/image/specialty/neumologia.jpg",
            "description" => "La neumología es la especialidad médica encargada del 
            estudio de las enfermedades del aparato respiratorio y centra su campo de 
            actuación en el diagnóstico, tratamiento y prevención de las enfermedades del 
            pulmón, la pleura y el mediastino.",
        ]);
        
        //
       /*  factory(Workspace::class, 10)->create(); */
    }
}
