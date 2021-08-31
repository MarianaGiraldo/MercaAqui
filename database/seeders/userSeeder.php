<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::create(['name'=>'juan', 'email'=>'juancorreo@gmail.com', 'celular' => '313254875', 'fecha_nacimiento' => '2021-08-10', 'password'=> bcrypt('contraseña123') ])->assignRole('administrador');
        user::create(['name'=>'manuel', 'email'=>'manuelcorreo@gmail.com', 'celular' => '313254875', 'fecha_nacimiento' => '2021-08-10', 'password'=> bcrypt('contraseña123') ])->assignRole('usuario');
        user::factory(10)->create();

    }
}
