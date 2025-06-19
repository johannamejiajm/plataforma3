<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class RolesAndPermissionsUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

         // Crear roles
         $adminRole = Role::create(['name' => 'admin']);
         $publicadorRole = Role::create(['name' => 'publicador']);
         $tesoreroRole = Role::create(['name' => 'tesorero']);

         // Crear permisos
         $managePubliaciones = Permission::create(['name' => 'manage_publicaciones']);
         $manageRoles = Permission::create(['name' => 'manage_roles']);
         $managePermisos = Permission::create(['name' => 'manage_permisos']);
         $manageUsers = Permission::create(['name' => 'manage_users']);
         $manageEventos = Permission::create(['name' => 'manage_eventos']);
         $manageArtistas = Permission::create(['name' => 'manage_artistas']);
         $manageContactos = Permission::create(['name' => 'manage_contactos']);
        $manageInformacion = Permission::create(['name' => 'manage_informacion']);
        $manageDonaciones = Permission::create(['name' => 'manage_donaciones']);
         // Asignar permisos a roles
         $adminRole->givePermissionTo([$managePubliaciones, $manageInformacion, $manageRoles, $managePermisos, $manageUsers, $manageEventos, $manageContactos, $manageArtistas, $manageDonaciones]);
         $publicadorRole->givePermissionTo([$managePubliaciones, $manageArtistas, $manageEventos, $manageInformacion]);
         $tesoreroRole->givePermissionTo($manageDonaciones);

          DB::table('users')->insert([
            [
                'name' => 'Administrador',
                'email' => 'administrador@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('admin123456789'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Publicador',
                'email' => 'publicador@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('publicador123456789'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'name' => 'tesorero',
                'email' => 'tesorero@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('tesorero123456789'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Obtener usuarios por su correo electrónico
        $admin = User::where('email', 'administrador@gmail.com')->first();
        $publicador = User::where('email', 'publicador@gmail.com')->first();
        $tesorero = User::where('email', 'tesorero@gmail.com')->first();

        // Asignar roles
        $admin->assignRole($adminRole);
        $publicador->assignRole($publicadorRole);
        $tesorero->assignRole($tesoreroRole);

    }
}

