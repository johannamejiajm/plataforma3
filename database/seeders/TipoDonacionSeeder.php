<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoDonacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener la fecha y hora actual
        $now = Carbon::now();

        DB::table('tipodonaciones')->insert([
            [
                'tipo' => 'aprobado',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'tipo' => 'denegado',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'tipo' => 'pendiente',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}