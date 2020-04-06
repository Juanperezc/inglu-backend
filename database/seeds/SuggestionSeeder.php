<?php

use Illuminate\Database\Seeder;
use App\Suggestion;
class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suggestion::create([
        "description" => "Tengo una sugerencia acerca del Club",
        "type" => "Club/Coordinación",
        ]);
        Suggestion::create([
            "description" => "Tengo una sugerencia acerca del Medico",
            "type" => "Club/Personal",
            ]);
            Suggestion::create([
                "description" => "Tengo una sugerencia acerca del Tratamiento",
                "type" => "Club/Coordinación",
                ]);
        //
       /*  factory(Workspace::class, 10)->create(); */
    }
}
