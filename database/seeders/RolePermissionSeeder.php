<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear permisos
        $permissions = ['crear', 'editar', 'eliminar'];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear rol de admin y asignarle permisos
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions($permissions);

        // Asignar rol de admin a un usuario existente o crearlo
        $adminUser = User::firstOrCreate(
            ['email' => 'juanadmin@example.com'],
            [
                'name' => 'Juan Sebastian Castro Sanchez',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Asignar el rol de admin al usuario
        $adminUser->assignRole('admin');
    }
}
