<?php

namespace Database\Seeders;

use Faker\Guesser\Name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name'=>'admin']);
        $clienteRole = Role::create(['name'=>'cliente']);

        $permissionIndexCategory = Permission::create(['name'=>'view categories']);
        $permissionCreateCategory = Permission::create(['name'=>'create categories']);
        $permissionEditCategory = Permission::create(['name'=>'edit categories']);
        $permissionDeleteCategory = Permission::create(['name'=>'delete categories']);

        $permissionIndexService = Permission::create(['name'=>'view services']);
        $permissionCreateService = Permission::create(['name'=>'create services']);
        $permissionEditService = Permission::create(['name'=>'edit services']);
        $permissionDeleteService = Permission::create(['name'=>'delete services']);

        $permissionIndexPost = Permission::create(['name'=>'view posts']);
        $permissionCreatePost = Permission::create(['name'=>'create posts']);
        $permissionEditPost = Permission::create(['name'=>'edit posts']);
        $permissionDeletePost = Permission::create(['name'=>'delete posts']);

        $permissionIndexUser = Permission::create(['name'=>'view users']);
        $permissionCreateUser = Permission::create(['name'=>'create users']);
        $permissionEditUser = Permission::create(['name'=>'edit users']);
        $permissionDeleteUser = Permission::create(['name'=>'delete users']);

         $adminRole->givePermissionTo(Permission::all());

         $clienteRole->givePermissionTo([
            $permissionIndexService,

         ]);   


    }
}
