<?php

namespace Database\Seeders;

use App\Models\Informacioninstitucional;
use App\Models\Tipoinformacion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
      /*   User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        $this->call([

            UsersTableSeeder::class,
            ContactosSeeder::class,
            TipopublicacionesSeeder::class,
            PublicacionesSeeder::class,
            TipoInfromacionTable::class,
            InformacionInstitucionalSeeder::class,
            TipoDonacionesSeeder::class,
            DonacionSeeder::class,
            RolesAndPermissionsUser::class,
            PublicacionesSeeder::class,

        ]);



    }
}
