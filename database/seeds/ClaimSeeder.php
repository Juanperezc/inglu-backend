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
        "description" => "Tengo una queja acerca del Club",
        "type" => "Club/Coordinación",
        ]);
        //
       /*  factory(Workspace::class, 10)->create(); */
    }
}
