<?php

use Illuminate\Database\Seeder;
use App\SiteTeam;

class SiteTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
       $site_team =  SiteTeam::create([
           'title' => 'NUESTRO EQUIPO',
           'subtitle' => "",
       ]);
    }
}
