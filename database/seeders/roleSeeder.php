<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permission1 = Permission::create(['name' => 'menuHome']);
        $permission2 = Permission::create(['name' => 'indexUsuarios']);
        $permission3 = Permission::create(['name' => 'eliminarVenta']);
        $permission4 = Permission::create(['name' => 'editarVenta']);
        $permission5 = Permission::create(['name' => 'editarUsuario']);
        $permission6 = Permission::create(['name' => 'eliminarUsuario']);
        $permission7 = Permission::create(['name' => 'showUsuario']);

        $role = Role::create(['name' => 'Admin'])->syncPermissions(Permission::all());
        $role2 = Role::create(['name' => 'Vendedor'])->syncPermissions($permission1);

    }
}
