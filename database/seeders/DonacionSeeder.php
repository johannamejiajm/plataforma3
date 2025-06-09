<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DonacionSeeder extends Seeder
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

        // Insertar datos en la tabla 'donaciones'
        DB::table('donaciones')->insert([
            [
                'idtipo' => 1, // Esto corresponde a 'aprobado' en la tabla tipodonaciones
                'nombre' => 'Juan',
                'apellido' =>'Pérez',
                'email' =>'juan@example.com',
                'telefono' =>'3112224334',
                'donacion' => 10000,
                'soporte' => 'Efectivo',
                'estado' => '0', // Estado aprobado
                'created_at' => $now,
                'updated_at' => $now,

            ],

            [
                'idtipo' => 1,
                'nombre' => 'Carlos',
                'apellido' =>'Rodriguez',
                'email' =>'carlos@example.com',
                'telefono' =>'3112224334',
                'donacion' => 15000,
                'soporte' => 'Efectivo',
                'estado' => '0',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
               'idtipo' => 1,
                'nombre' => 'Alexander',
                'apellido' =>'Mejia',
                'email' =>'alexander@example.com',
                'telefono' =>'3112224334',
                'donacion' => 20000,
                'soporte' => 'Efectivo',
                'estado' => '0',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
