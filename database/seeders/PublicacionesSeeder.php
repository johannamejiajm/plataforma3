<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PublicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('publicaciones')->insert([
            [
                'idtipo' => 1,
                'iduser' => 1,
                'titulo' => 'Primera publicación de prueba',
                'contenido' => 'Este es un contenido de prueba para la primera publicación.',
                'fechainicial' => Carbon::now(),
                'fechafinal' => Carbon::now()->addDays(10),
                'estado' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idtipo' => 2,
                'iduser' => 2,
                'titulo' => 'Segunda publicación de ejemplo',
                'contenido' => 'Otra publicación para probar el sistema.',
                'fechainicial' => Carbon::now()->addDay(),
                'fechafinal' => Carbon::now()->addDays(15),
                'estado' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
