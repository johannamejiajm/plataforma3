<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoInfromacionTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tipoinformacion')->insert([
            ['tipo' => 'Quiénes Somos', 'created_at' => now(), 'updated_at' => now()],
            ['tipo' => 'Misión', 'created_at' => now(), 'updated_at' => now()],
            ['tipo' => 'Visión', 'created_at' => now(), 'updated_at' => now()],
            ['tipo' => 'Valores', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
