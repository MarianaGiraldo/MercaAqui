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
        $role1 = Role::create(['name' => 'administrador']);
        $role2 = Role::create(['name' => 'usuario']);

        $permission = Permission::create(['name' => 'menuHome'])-> syncRoles($role1, $role2);
        $permission = Permission::create(['name' => 'verRegistro'])-> syncRoles($role1, $role2);
        $permission = Permission::create(['name' => 'eliminarProducto'])-> syncRoles($role1);
    }
}
