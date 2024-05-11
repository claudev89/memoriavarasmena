<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_editor = Role::create(['name' => 'editor']);

        $permission_create_publicacion = Permission::create(['name' => 'crear publicacion']);
        $permission_update_publicacion = Permission::create(['name' => 'actualizar publicacion']);
        $permission_delete_publicacion = Permission::create(['name' => 'eliminar publicacion']);

        $permissions_admin = [
            $permission_create_publicacion,
            $permission_update_publicacion,
            $permission_delete_publicacion
        ];

        $permissions_editor = [
            $permission_create_publicacion,
            $permission_update_publicacion,
            $permission_delete_publicacion
        ];

        $role_admin->syncPermissions($permissions_admin);
        $role_editor->syncPermissions($permissions_editor);
    }
}
