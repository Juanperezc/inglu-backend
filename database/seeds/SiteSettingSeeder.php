<?php

use Illuminate\Database\Seeder;
use App\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        SiteSetting::create([
           'title' => 'CLUB DE DIABETICOS LAS MERCEDES',
           'subtitle' => "La ayuda que tu cuerpo y mente necesitan",
           'playstore_url'  => "https://play.google.com/store?hl=es_CL",
           'linkedin_url'  => "https://www.linkedin.com/",
           'facebook_url'  => "https://facebook.com/",
           'twitter_url'  => "https://twitter.com/"

       ]);
    }
}
