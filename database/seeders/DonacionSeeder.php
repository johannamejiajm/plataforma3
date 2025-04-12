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
                'fecha' => $now,
                'donante' => 'Juan Pérez',
                'contacto' => 'juan@example.com',
                'donacion' => '1000 USD',
                'soporte' => 'Transferencia bancaria',
                'estado' => '1', // Estado aprobado
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'idtipo' => 2, // Esto corresponde a 'denegado' en la tabla tipodonaciones
                'fecha' => $now,
                'donante' => 'Ana Gómez',
                'contacto' => 'ana@example.com',
                'donacion' => '500 USD',
                'soporte' => 'Cheque',
                'estado' => '0', // Estado denegado
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'idtipo' => 3, // Esto corresponde a 'pendiente' en la tabla tipodonaciones
                'fecha' => $now,
                'donante' => 'Carlos López',
                'contacto' => 'carlos@example.com',
                'donacion' => '250 USD',
                'soporte' => 'Efectivo',
                'estado' => '1', // Estado aprobado
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}