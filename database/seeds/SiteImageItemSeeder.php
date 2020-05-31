<?php

use Illuminate\Database\Seeder;
use App\SiteImageItem;

class SiteImageItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $site_image_item =  SiteImageItem::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/cita-seleccion.png',
            'description' => null,
            'site_image_id' => 1,
        ]);

        $site_image_item =  SiteImageItem::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/citas.png',
            'description' => null,
            'site_image_id' => 1,
        ]);

        $site_image_item =  SiteImageItem::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/configuracion-notificaciones.png',
            'description' => null,
            'site_image_id' => 1,
        ]);

        $site_image_item =  SiteImageItem::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/cita-seleccion.png',
            'description' => null,
            'site_image_id' => 1,
        ]);

        $site_image_item =  SiteImageItem::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/configuracion-notificaciones.png',
            'description' => null,
            'site_image_id' => 1,
        ]);

        $site_image_item =  SiteImageItem::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/evento-detalle.png',
            'description' => null,
            'site_image_id' => 1,
        ]);

        $site_image_item =  SiteImageItem::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/eventos.png',
            'description' => null,
            'site_image_id' => 1,
        ]);
    }
}
