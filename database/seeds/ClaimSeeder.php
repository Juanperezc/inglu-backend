<?php

use Illuminate\Database\Seeder;
use App\Claim;
class ClaimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Claim::create([
            "description" => "Quejas sobre el funcionamiento del club en general.",
            "type" => "Club/Coordinación",
            ]);
        Claim::create([
            "description" => "Quejas sobre el desempeño o acciones del personal del club
            (medicos,administrativos,voluntarios).",
            "type" => "Club/Personal",
            ]);
        Claim::create([
            "description" => "Quejas referentes al tratamiento sumistrado por el medico:
             disponibilidades, precios, efectos secundarios inesperados o relacionados.",
            "type" => "Club/Medicinas",
            ]);
        Claim::create([
            "description" => "Quejas sobre el desarrollo de alguna cita, problemas como
            cancelaciones sin explicación, reprogramaciones sin autorización, mala organización
            y relacionadas.",
            "type" => "Club/Citas",
            ]);
        Claim::create([
            "description" => "Quejas sobre el desarrollo de alguna actividad, problemas como
            cancelaciones sin explicación, reprogramaciones sin autorización, mala organización
            y relacionadas.",
            "type" => "Club/Actividades",
            ]);
        Claim::create([
            "description" => "Quejas relacionadas al mal o inesperado funcionamiento de
            la aplicación movil",
            "type" => "Club/Aplicación",
            ]);
        Claim::create([
            "description" => "Quejas referentes al estado fisico de las instalaciones del club
            o donde se desarrolle alguna de sus actividades",
            "type" => "Club/Infraestructura",
            ]);
        
        /*
        ClaimUser ::create([
            "text" => "Ultimamente el personal del club no se encuentra
            en sus espacios de trabajo a la hora indicada",
            "user_id" => "",
            "type" => "Club/Coordinacion",
            ]);
        ClaimUser::create([
            "text" => "El medico Medico Rafael nunca llega puntual
             a sus citas y hace esperar mucho a sus pacientes",
             "user_id" => "",
             "status" => "",
             "type" => "Club/Personal",
            ]);
        ClaimUser::create([
            "text" => "El tratamiento que me recetaron, contiene medicamentos
            muy dificiles de conseguir, debieron darme mas opciones para buscar",
            "user_id" => "",
            "status" => "",
            "type" => "Club/Medicinas",
            ]);
        ClaimUser ::create([
            "text" => "Se me ha hecho imposible reprogramar una cita, ya que
            me cancelaron la anterior y el medico ya no va a ver los días que
            yo estoy disponible",
            "user_id" => "",
            "type" => "Club/Citas",
            ]);
        ClaimUser ::create([
            "text" => "En la ultima actividad de yoga, el entrenador no pudo
            asistir y envió a un suplente que dejo mucho que desear en cuanto
            a su desempeño",
            "user_id" => "",
            "type" => "Club/Actividades",
            ]);
        ClaimUser ::create([
            "text" => "Desde la ultima actualización, la aplicación se cierra
            inesperadamente muy seguido, es frustrante",
            "user_id" => "",
            "type" => "Club/Aplicación",
            ]);
        ClaimUser ::create([
            "text" => "Las zonas comunes del club han estado descuidadas ultimamente,
            además en algunos de los consultorios no hay aire acondicionado y hay goteras",
            "user_id" => "",
            "type" => "Club/Infraestructura",
            ]);   
        */
       /*  factory(Workspace::class, 10)->create(); */
    }
}
