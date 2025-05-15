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
         $tesoreroRole = Role::create(['name' => 'tesorero']);

         // Crear permisos
         $managePubliaciones = Permission::create(['name' => 'manage_publicaciones']);
         $manageRoles = Permission::create(['name' => 'manage_roles']);
         $managePermisos = Permission::create(['name' => 'manage_permisos']);
         $manageUsers = Permission::create(['name' => 'manage_users']);

         // Asignar permisos a roles
         $adminRole->givePermissionTo([$managePubliaciones, $manageRoles, $managePermisos, $manageUsers]);
         $tesoreroRole->givePermissionTo($managePubliaciones);
    }
}
