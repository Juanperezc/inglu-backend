<?php

use Illuminate\Database\Seeder;
use App\SiteImage;

class SiteImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
       $site_image =  SiteImage::create([
           'title' => 'DISFRUTA DE NUESTRA APP',
           'subtitle' => null
       ]);
    }
}
