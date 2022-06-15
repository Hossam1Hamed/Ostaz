<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // role
            [
                'name' => 'roles_index',
                'display_name' => 'access',
                'key' => 'roles'
            ],
            [
                'name' => 'roles_view',
                'display_name' => 'view',
                'key' => 'roles'
            ],
            [
                'name' => 'roles_create',
                'display_name' => 'create',
                'key' => 'roles'
            ],
            [
                'name' => 'roles_edit',
                'display_name' => 'edit',
                'key' => 'roles'
            ],
            [
                'name' => 'roles_delete',
                'display_name' => 'delete',
                'key' => 'roles'
            ],
            [
                'name' => 'roles_block',
                'display_name' => 'block',
                'key' => 'roles'
            ],

        

            // area
            [
                'name' => 'areas_index',
                'display_name' => 'access',
                'key' => 'areas'
            ],
            [
                'name' => 'areas_view',
                'display_name' => 'view',
                'key' => 'areas'
            ],
            [
                'name' => 'areas_create',
                'display_name' => 'create',
                'key' => 'areas'
            ],
            [
                'name' => 'areas_edit',
                'display_name' => 'edit',
                'key' => 'areas'
            ],
            [
                'name' => 'areas_delete',
                'display_name' => 'delete',
                'key' => 'areas'
            ],
            [
                'name' => 'areas_block',
                'display_name' => 'block',
                'key' => 'areas'
            ],

            // specialization

            [
                'name' => 'specializations_index',
                'display_name' => 'access',
                'key' => 'specializations'
            ],
            [
                'name' => 'specializations_view',
                'display_name' => 'view',
                'key' => 'specializations'
            ],
            [
                'name' => 'specializations_create',
                'display_name' => 'create',
                'key' => 'specializations'
            ],
            [
                'name' => 'specializations_edit',
                'display_name' => 'edit',
                'key' => 'specializations'
            ],
            [
                'name' => 'specializations_delete',
                'display_name' => 'delete',
                'key' => 'specializations'
            ],
            [
                'name' => 'specializations_block',
                'display_name' => 'block',
                'key' => 'specializations'
            ],


            // employee
            [
                'name' => 'employees_index',
                'display_name' => 'access',
                'key' => 'employees'
            ],
            [
                'name' => 'employees_view',
                'display_name' => 'view',
                'key' => 'employees'
            ],
            [
                'name' => 'employees_create',
                'display_name' => 'create',
                'key' => 'employees'
            ],
            [
                'name' => 'employees_edit',
                'display_name' => 'edit',
                'key' => 'employees'
            ],
            [
                'name' => 'employees_delete',
                'display_name' => 'delete',
                'key' => 'employees'
            ],
            [
                'name' => 'employees_block',
                'display_name' => 'block',
                'key' => 'employees'
            ],

        ];

        foreach($permissions as $permission){
            Permission::create($permission);
        }

    }
}