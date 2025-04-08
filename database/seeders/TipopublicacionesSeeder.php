<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TipopublicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipopublicaciones')->insert([
            [
                'tipo' => 'Noticias',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo' => 'Eventos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo' => 'Historias',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
