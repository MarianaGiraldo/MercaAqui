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
        $role = Role::create(['name' => 'Admin'])->syncPermissions(Permission::all());
        $role2 = Role::create(['name' => 'Vendedor'])->syncPermissions(Permission::where('name', PermissionSeeder::INDEX_HOME)->first());

    }
}
