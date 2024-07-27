<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Admin', 'description' => 'Administrator role']);

        $permissions = [
            'view_users',
            'edit_users',
            'delete_users',
            'create_products',
            'view_products',
            'edit_products',
            'delete_products'
        ];

        foreach ($permissions as $permission) {
            $permissionModel = Permission::create(['name' => $permission, 'description' => ucfirst(str_replace('_', ' ', $permission))]);
            $adminRole->permissions()->attach($permissionModel);
        }
    }
}
