<?php

use Illuminate\Database\Seeder;
use App\SiteJoin;

class SiteJoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
       $site_join =  SiteJoin::create([
           'title' => 'POR QUE INSCRIBIRSE EN EL CLUB',
           'img' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/MedidorGlu.png',
           'subtitle' => "El club de Diabetes es un espacio de atención especializada en nutrición y apoyo psicológico, accesible y eficiente, orientado a mejorar la calidad de vida de los pacientes con diagnósticos de alteraciones de la glucosa como la diabetes. Si padeces de diabetes o algunos de tus familiares o amigos posee dicha patología, dale una oportunidad al club y descubre como con su ayuda puedes llevar una vida mas amena, conocer y relacionarse con otras personas que sufren la misma enfermedad e integrar a tu familia a un estilo de vida saludable donde se apoyen mutuamente.",
       ]);
    }
}
