<?php

use Illuminate\Database\Seeder;
use App\Suggestion;
use App\SuggestionUser;
class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sug1 = Suggestion::create([
            "description" => "Sugerencias sobre el funcionamiento del club en general",
            "type" => "Club/Coordinación",
        ]);
        $sug2 = Suggestion::create([
            "description" => "Sugerencias acerca del personal del club
            (medicos,administrativos,voluntarios)",
            "type" => "Club/Personal",
        ]);
        $sug3 = Suggestion::create([
           "description" => "Sugerencias referentes al tratamiento sumistrado por el medico:
           disponibilidades, precios, efectos secundarios inesperados o relacionados.",
            "type" => "Club/Medicinas",
        ]);
        $sug4 = Suggestion::create([
            "description" => "Sugerencias relacionadas al desarrollo de citas incluyendo, medicos,
            insumos, horarios, entre otros.",
             "type" => "Club/Citas",
        ]);
        $sug5 = Suggestion::create([
            "description" => "Sugerencias sobre el desarrollo de alguna actividad, incluyendo
            sugerencias sobre ubicaciones, entrenadores u actividades a realizar .",
             "type" => "Club/Actividades",
        ]);
        $sug6 = Suggestion::create([
            "description" => "Sugerencias relacionadas diseño o funcionalidad de la aplicación movil",
             "type" => "Club/Aplicación",
        ]);
        $sug7 = Suggestion::create([
            "description" => "Sugerencias referentes a la infraestructura fisca del club",
             "type" => "Club/Infraestructura",
        ]);

        SuggestionUser::create([
            "text" => "Sería buena idea dar un curso sobre como funciona el club a todos
            sus miembros para que puedan resolver cualquier duda sencilla que tenga un paciente
            u otra persona interesada",
            "status" => 0,
            "user_id" => rand(9,10),
            "suggestion_id" => $sug1->id,
            //"type" => "Club/Coordinacion",
        ]);
        SuggestionUser::create([
            "text" => "Deberían colocar en lugares mas visibles los horarios de cada uno de los
            departamentos del club",
            "status" => 1,
            "user_id" => rand(9,10),
            "suggestion_id" => $sug2->id,
        ]);
        SuggestionUser::create([
            "text" => "Existe una farmacia en la calle 19 entre 29 y 30 donde se
            consiguen muchos de los medicamentos recetados",
            "status" => 0,
            "user_id" => rand(9,10),
            "suggestion_id" => $sug3->id,
        ]);
        SuggestionUser::create([
            "text" => "Las citas de ciertos medicos son muy dificiles de conseguir,
            tal vez podrían asignar un periodo extra para cada medico",
            "status" => 1,
            "user_id" => rand(9,10),
            "suggestion_id" => $sug4->id,
        ]);
        SuggestionUser::create([
            "text" => "Sería buena idea realizar mas frecuentemente actividades
             como bailoterapias, existe mucha demanda para ellas",
            "status" => 1,
            "user_id" => rand(9,10),
            "suggestion_id" => $sug5->id,
        ]);
        SuggestionUser::create([
            "text" => "Deberían colocar un tema oscuro para la aplicación movil",
            "status" => 0,
            "user_id" => rand(9,10),
            "suggestion_id" => $sug6->id,
        ]);
        SuggestionUser::create([
            "text" => "Creo que si se tuviese un ascensor extra en la nueva torre, el desplazamiento
            sería mucho mas rapido, en algunos momentos se puede conguestionar mucho",
            "status" => 1,
            "user_id" => rand(9,10),
            "suggestion_id" => $sug7->id,
        ]);
        //
       /*  factory(Workspace::class, 10)->create(); */
    }
}
