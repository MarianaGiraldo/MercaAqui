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
        $users = User::factory(10)->create();
        foreach ($users as $user){
            if ($user->is_admin) {
                $user->assignRole('Admin');
            }else {
                $user->assignRole('Vendedor');
            };
        };


    }
}
