<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DonacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table("donaciones")->insert([
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
                'estado' => '2', // Estado denegado
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'idtipo' => 0, // Esto corresponde a 'pendiente' en la tabla tipodonaciones
                'fecha' => $now,
                'donante' => 'Carlos López',
                'contacto' => 'carlos@example.com',
                'donacion' => '250 USD',
                'soporte' => 'Efectivo',
                'estado' => '0', // Estado aprobado
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
