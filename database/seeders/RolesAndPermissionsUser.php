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
         $viewPermission = Permission::create(['name' => 'view publicaciones']);
         $createPermission = Permission::create(['name' => 'create publicaciones']);
         $editPermission = Permission::create(['name' => 'edit publicaciones']);
         $deletePermission = Permission::create(['name' => 'delete publicaciones']);

         // Asignar permisos a roles
         $adminRole->givePermissionTo([$viewPermission, $createPermission, $editPermission, $deletePermission]);
         $tesoreroRole->givePermissionTo($viewPermission);
    }
}
