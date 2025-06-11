<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DonacionSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('donaciones')->insert([
            [
                'nombre' => 'Juan',
                'apellido' =>'Pérez',
                'email' =>'juan@example.com',
                'telefono' =>'3112224334',
                'donacion' => 10000,
                'tipodonacion' => 'Efectivo',
                'soporte' => 'soporte1.jpg',
                'idtipo' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Carlos',
                'apellido' =>'Rodriguez',
                'email' =>'carlos@example.com',
                'telefono' =>'3112224334',
                'donacion' => 15000,
                'tipodonacion' => 'Efectivo',
                'soporte' => 'soporte1.jpg',
                'idtipo' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Alexander',
                'apellido' =>'Mejia',
                'email' =>'alexander@example.com',
                'telefono' =>'3112224334',
                'donacion' => 20000,
                'tipodonacion' => 'Efectivo',
                'soporte' => 'soporte1.jpg',
                'idtipo' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
