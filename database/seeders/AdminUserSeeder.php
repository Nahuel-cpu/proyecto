<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el usuario admin
        $admin = User::create([
            'email' => 'admin@1.com',
            'name' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // Verificar si el rol existe, si no, lo crea
        $role = Role::firstOrCreate(
            ['name' => 'admin', 'guard_name' => 'web']
        );

        // Asignar todos los permisos al rol admin
        $permissions = Permission::all();
        $role->syncPermissions($permissions);

        // Asignar el rol al usuario
        $admin->assignRole($role);
    }
}
