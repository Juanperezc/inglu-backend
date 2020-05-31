<?php

use Illuminate\Database\Seeder;
use App\SiteTeamMember;

class SiteTeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $site_team_member =  SiteTeamMember::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/Juan.png',
            'name' => 'Juan Pérez',
            'role' => 'Web & App developer',
            'site_team_id' => 1,
        ]);
        $site_team_member =  SiteTeamMember::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/Marco.png',
            'name' => 'Marco Sáenz',
            'role' => 'Web & App developer',
            'site_team_id' => 1,
        ]);
       /*  factory(SiteTeamMember::class, 3)->create(); */
    }
}
