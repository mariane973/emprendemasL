<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        //$role = Role::create(['name'=>'Admin']);
        $role1 = Role::create(['name'=>'Vendedor']);
        $role2 = Role::create(['name'=>'Cliente']);

        Permission::create(['name'=>'comprarProducto'])->syncRoles([$role2]);
        Permission::create(['name'=>'editarProducto'])->syncRoles([$role1]);
        Permission::create(['name'=>'eliminarProducto'])->syncRoles([$role1]);
    }
}