<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public const INDEX_HOME = 'index';
    public const USUARIOS_INDEX = 'usuarios.index';
    public const USUARIOS_SHOW = 'usuarios.show';
    public const USUARIOS_EDIT = 'usuarios.editar';
    public const USUARIOS_DROP = 'usuarios.drop';
    public const VENTAS_DROP = 'ventas.drop';
    public const VENTAS_EDIT = 'ventas.edit';

    public static function supported(): array
    {
        return collect(static::toArray())->values()->toArray();
    }

    /**
     *
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->supported() as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
