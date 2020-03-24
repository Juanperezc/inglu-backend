<?php

use Illuminate\Database\Seeder;
use App\Walkthrough;
class WalkthroughSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Walkthrough::create([
        "title" => "Bienvenido al club",
        "type" => "web",
        "roles" => [1,2,3],
        "description" => "Bienvenido al club"
        ]);
        //
       /*  factory(Workspace::class, 10)->create(); */
    }
}
