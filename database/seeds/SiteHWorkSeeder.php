<?php

use Illuminate\Database\Seeder;
use App\SiteHWork;

class SiteHWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
       $site_image =  SiteHWork::create([
           'title' => '¿ PARA QUÉ SIRVE EL CLUB ?',
           'subtitle' => "",
       ]);
    }
}
