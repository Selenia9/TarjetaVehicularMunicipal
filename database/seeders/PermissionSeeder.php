<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'permission_index',
            'permission_create',
            'permission_show',
            'permission_edit',
            'permission_destroy',

            'role_index',
            'role_create',
            'role_show',
            'role_edit',
            'role_destroy',

            'user_index',
            'user_create',
            'user_show',
            'user_edit',
            'user_destroy',

            'organizacione_index',
            'organizacione_create',
            'organizacione_show',
            'organizacione_edit',
            'organizacione_destroy',

            'propietarios_index',
            'propietarios_create',
            'propietarios_show',
            'propietarios_edit',
            'propietarios_destroy',

            'vehiculo_index',
            'vehiculo_create',
            'vehiculo_show',
            'vehiculo_edit',
            'vehiculo_destroy',
            'vehiculo_downloadPdf',
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
