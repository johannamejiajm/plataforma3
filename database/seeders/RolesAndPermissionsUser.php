<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
         $adminRole->givePermissionTo([$managePubliaciones, $manageInformacion, $manageRoles, $managePermisos, $manageUsers, $manageEventos, $manageContactos, $manageArtistas]);
         $publicadorRole->givePermissionTo([$managePubliaciones, $manageArtistas, $manageEventos, $manageInformacion]);
         $tesoreroRole->givePermissionTo($manageDonaciones);
    }
}
