<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;



class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(10)->create();
        foreach ($users as $user){
            if ($user->is_admin) {
                $user->assignRole('Admin');
            }else {
                $user->assignRole('Vendedor');
            };
        };

        //-------------------Usuario felipe--------------//
        User::Create([
            'nombre' => 'David Felipe' ,
            'apellido' => 'Castro Herrera',
            'celular' => '3192097403',
            'fecha_nacimiento' => random_int(10, 120),
            'email' => 'castroherreradavid@gmail.com',
            'password' => bcrypt('changeme'),
            'is_admin' => '1',
            'remember_token' => Str::random(10), 
        ])->assignRole('Admin');

        //-------------------Usuario Mariana--------------//
        User::Create([
            'nombre' => 'Mariana' ,
            'apellido' => 'Giraldo Luna',
            'celular' => '3192097403',
            'fecha_nacimiento' => random_int(10, 120),
            'email' => 'mariana@gmail.com',
            'password' => bcrypt('changeme'),
            'is_admin' => '1',
            'remember_token' => Str::random(10), 
        ])->assignRole('Admin');
    }
}
