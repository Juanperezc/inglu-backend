<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Post::create([
            'photo' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/CoronavirusG.jpg',
            'title' => "Coronavirus y diabetes: preparados, no asustados",
            'description' => 'Dada la alarma sanitaria y social que está provocando la pandemia de coronavirus,
             y su especial impacto en las poblaciones de edad más avanzada y/o con enfermedades asociadas,
             desde la Sociedad Española de Diabetes (SED) se quiere mandar un mensaje de calma y tranquilidad,
             así como se ofrecen algunas recomendaciones prácticas para las personas con diabetes.
             Los coronavirus son virus tipo ARN monocatenarios positivos, lo cual quiere decir que
             no precisan de gran parte de la maquinaria de la célula huésped para replicarse directamente en su citoplasma.
             “Son simples y efectivos”, como indica el Dr. Alfonso López Alba, endocrinólogo y Director de
             Comunicación de la Sociedad Española de Diabetes (SED). Su analogía con una corona corresponde a la forma
             esférica de su cubierta (cápside) que contiene proteínas con restos de azúcares (glicoproteina S) que forman los abultamientos de su superficie (plexómeros) y que facilitan su penetración en las membranas de las células, sobre todo epiteliales, de las mucosas del tracto respiratorio. Tal y como explica el experto de la SED, “estas características explican su alta capacidad de contagio”.
             Su transmisión se produce mediante pequeñas gotas en aerosol, mayores de 5 micras de diámetro, de las secreciones respiratorias y, lo que es muy importante, por transmisión mecánica a través del contacto cutáneo. Como esas pequeñas gotas raramente alcanzan distancias mayores a 2 metros, “resulta en general más eficaz el correcto lavado de manos y el uso de geles hidroalcohólicos que las mascarillas, no siempre utilizadas de forma correcta y que, en su mayoría, no tienen especificaciones para la protección frente a virus”, aclara el Dr. Alfonso López Alba, quien indica que “estarían básicamente indicadas para personas infectadas y profesionales de la sanidad”. Además, según añade, “pueden crear una falsa sensación de seguridad y si no son correctamente desechadas podrían producir, incluso, riesgo de contagio por el contacto con su exterior”',
            'category_id' => 3,
            'user_id' => 1,
        ]);
        Post::create([
            'photo' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/Ciclismo.jpg',
            'title' => "Diabetes y ciclismo: sí se puede",
            'description' => 'El suizo Oliver Behringer, el británico Samuel Brand, el finlandés Joonas Henttala,
             el español David Lozano, el italiano Andrea Perón y el uzbeco Ulugbek Sidov representan al Novo Nordisk
             en el Tour Colombia y llevan un mensaje claro: la diabetes no es ningún impedimento para ser ciclista profesional.',
            'category_id' => 1,
            'user_id' => 1,
        ]);
        Post::create([
            'photo' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/Adolescencia.jpg',
            'title' => "Como afrontar la diabetes en la adolescencia",
            'description' => "La Fundación para la Diabetes crea un Consejo Asesor Juvenil,
             un grupo de 19 adolescentes con el objetivo de dar respuesta a adolescentes que se
             encuentran en su misma situación.La cocina o el deporte son herramientas de visibilización
             y normalización de la diabetes, pero ¿cómo afecta esta enfermedad a un segmento poblacional
             tan sensible como los adolescentes?",
            'category_id' => 2,
            'user_id' => 1,
        ]);
        Post::create([
            'photo' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/tel.jpg',
            'title' => 'Herramientas móviles para la diabetes mejoran el control glucémico',
            'description' => "Según un estudio nuevo, los pacientes con diabetes tipo 2 (DT2)
             que usan dispositivos móviles para acceder a los portales de control de la diabetes tenían
              más adherencia al tratamiento y mejores niveles de hemoglobina glicosilada A1c (HbA1c).",
            'category_id' => 3,
            'user_id' => 1,
        ]);
        Post::create([
            'photo' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/odontologo.jpg',
            'title' => "¿Tienes diabetes? ¿Sabes que puede afectar a la salud de tu boca?",
            'description' => 'Expertos del Colegio de Dentistas ofrecen unas pautas a seguir por
             las personas que padecen esta enfermedad, para evitar complicaciones asociadas a la diabetes
             y enfermedades de las encías.
            ¿Puede la diabetes afectar a la salud bucodental? La respuesta es sí. Numerosos estudios
            demuestran la relación entre la patología diabética y enfermedades bucodentales graves como la periodontitis',
            'category_id' => 2,
            'user_id' => 1,
        ]);
        Post::create([
            'photo' => 'https://ingludiag.blob.core.windows.net/resources/image/portal/Farmacos.jpg',
            'title' => "Una combinación de fármacos contra la diabetes es capaz de restaurar la función de las células beta pancreáticas",
            'description' => "Una combinación de fármacos contra la diabetes es capaz de restaurar la función
            de las células beta pancreáticas.
            Investigadores del Helmholtz Zentrum München (Alemania), han demostrado por primera vez en un modelo
            experimental que una combinación de fármacos dirigida es capaz de restaurar la función de las células
            beta, lograr su rediferenciación y, por lo tanto, abrir potencialmente nuevas vías para la remisión
            de la diabetes.",
            'category_id' => 3,
            'user_id' => 1,
        ]);
        factory(Post::class, 2)->create();
    }
}
