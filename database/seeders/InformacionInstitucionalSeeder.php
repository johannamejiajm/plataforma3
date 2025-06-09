<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformacionInstitucionalSeeder extends Seeder
{
    public function run()
    {
        // Obtenemos los IDs de tipoinformacion usando la columna 'tipo'
        $tipos = DB::table('tipoinformacion')->pluck('id', 'tipo');

        // Insertamos la información institucional para cada tipo
        DB::table('informacioninstitucional')->insert([
            [
                'idtipo' => $tipos['Quiénes Somos'] ?? null,
                'contenido' => 'Somos una entidad sin ánimo de lucro comprometida con el desarrollo integral de niños, niñas y adolescentes en situación de vulnerabilidad. Nuestra labor se fundamenta en la educación deportiva, la promoción de la cultura y la participación comunitaria, pilares que nos permiten impulsar un cambio social positivo. Inspirados en nuestros valores de solidaridad, compromiso social, equidad, transparencia, espíritu comunitario, educación transformadora, innovación social y la celebración del arte, trabajamos día a día para construir una sociedad más justa e inclusiva en el municipio y la región.',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idtipo' => $tipos['Misión'] ?? null,
                'contenido' => 'Somos una Fundación que implementa un modelo de intervención integral para promover la educación Deportiva de calidad con apoyo privado, para niños y niñas en comunidades menos favorecidas desplazadas y en situación de vulnerabilidad en el municipio, donde la escuela es vista como un centro de desarrollo comunitario.',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idtipo' => $tipos['Visión'] ?? null,
                'contenido' => 'Para el 2030 la fundación PACHO’S CLUB debe ser reconocida como una de las principales entidades sociales de la región Cesar que promueva la distribución y utilización de fondos para caridad con el sólo propósito de contribuir el espíritu comunitario.',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idtipo' => $tipos['Valores'] ?? null,
                'contenido' => ' solidaridad, compromiso social, equidad, transparencia, espíritu comunitario, educación transformadora, innovación social y la celebración del arte',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
