<?php

use Illuminate\Database\Seeder;
use App\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Faq::create([
            "question" => "¿Como ingresar al club diabético?",
            "answer" => "Para ingresar al club debe enviar la información de contacto al final del portal, para que se le agende una cita con un médico del club, luego de ser evaluado en dicha cita se procederá a decidir si es apto (cuenta con la patología) para pertenecer al club, de ser este el caso se procederá al registro solicitando datos adicionales al paciente, de lo contrario no será permitido como paciente de club."
        ]);
        Faq::create([
            "question" => "¿Cuales son los requisitos para ingresar como paciente?",
            "answer" => "Para que una persona sea admitida en el club, debe padecer la patología de la diabetes u otra asociada a esta y haber llenado con éxito el formulario de inscripción."
        ]);
        Faq::create([
            "question" => "¿Cual es la ubicación del club?",
            "answer" => "Ascardio, calle 12 entre carreras 18 y 17. Barquisimeto, edo. Lara."
        ]);
        Faq::create([
            "question" => "¿Por qué debería inscribirme si soy diabético?",
            "answer" => "Porque es una oportunidad para aprender sobre todos los aspectos de la enfermedad, como convivir sanamente con ella, asi como tambien realizar actividades que ayuden a mejorar la salud física y mental de la persona, considerando también el contacto y apoyo que puedan brindarle otros miembros y personal del club y especialmente la familia del paciente, a la cual se le darán herramientas para que puedan servir de apoyo en el manejo de la enfermedad del paciente. "
        ]);
        Faq::create([
            "question" => "¿En que especialidades medicas me puede ayudar el club?",
            "answer" => "Existen médicos especialistas en cardiología, endocrinología, oftalmología, podología, odontología, así también como nutricionistas y psicologos."
        ]);
        Faq::create([
            "question" => "¿Como instalar la app del club?",
            "answer" => "La aplicación está destinada a dispositivos android, basta con buscar el nombre de la aplicación en la google play store e instalarla, también se cuenta con un enlace en el portal que redirecciona a la aplicación en dicha tienda."
        ]);
        Faq::create([
            "question" => "¿Como ingresar al club como miembro del grupo de apoyo?",
            "answer" => "Estamos encantados de recibir apoyo para el funcionamiento del club, de personas con diferentes capacidades, especialmente médicos, nutricionistas, entrenadores físicos, psicólogos y personal administrativo y logístico que ayude con los eventos del club. En caso de que desees colaborar como miembro del grupo de apoyo, dirígete en persona al club, donde se te dará más información y si es el caso se te registrará en el club."
        ]);
        Faq::create([
            "question" => "¿Se debe cancelar alguna cuota para pertenecer y beneficiarse del club?",
            "answer" => "No, este es un servicio que, actualmente, no posee cuota para registrarse y pertenecer al club, es decir es totalmente gratuito."
        ]);
        Faq::create([
            "question" => "¿Cuales son las funciones principales del club?",
            "answer" => "Las funciones fundamentales del club son las de capacitar y enseñar a sus miembros formas de llevar un sano estilo de vida en conjunto a su patología, y por otra parte, brindar el apoyo en el seguimiento de su condición."
        ]);
        /* factory(Post::class, 50)->create(); */
    }
}
