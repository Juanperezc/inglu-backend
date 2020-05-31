<?php

use App\SiteHWorkItem;
use Illuminate\Database\Seeder;

class SiteHWorkItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $site_h_work = SiteHWorkItem::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/1.png',
            'title' => 'Aprende',
            'description' => 'La principal función del club es garantizar que cada uno de los pacientes reciba la capacitación (conocimiento, habilidades y destrezas) indispensable para el buen control de la enfermedad.',
            'site_h_work_id' => 1,
        ]);

        $site_h_work = SiteHWorkItem::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/3.png',
            'title' => 'Coopera',
            'description' => 'El club permite la convivencia de los pacientes entre sí y con los miembros del equipo de salud. De esta manera puede ayudar a resolver los aspectos emocionales Y afectivos, que acompañan a la enfermedad.',
            'site_h_work_id' => 1,
        ]);

        $site_h_work = SiteHWorkItem::create([
            'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/5.png',
            'title' => 'Organiza',
            'description' => 'Los pacientes organizados son capaces de obtener recursos propios, para la adquisición colectiva de insumos necesarios para el control metabólico continuo.',
            'site_h_work_id' => 1,
        ]);
        /*     factory(SiteHWorkItem::class, 3)->create(); */
    }
}
