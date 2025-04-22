<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TipoDonacionesSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now =Carbon::now();
        DB::table('tipodonaciones')->insert( [
                [ 
                'tipo'=>  'aprobado',
                'created_at'=> $now,
                'updated_at'=> $now,


                ],
 
            
                [
                'tipo'=>  'denegado',
                'created_at'=> $now,
                'updated_at'=> $now,
                ],
                [
                    'tipo'=> 'pendiente',
                    'created_at'=> $now,
                    'updated_at'=> $now,
                    ],
]
            
        );
    }
}
