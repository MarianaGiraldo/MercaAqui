<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A test to index user
     *
     * @return void
     */
    public function test_index_user()
    {
        $user = new User();
        $user->id = 1;
        $user->nombre = 'David Felipe ';
        $user->apellido = 'Castro Herrera';
        $user->celular = '3192154875';
        $user->fecha_nacimiento = '1997-12-11';
        $user->correo = 'castroherreradavid@gmail.com';
        $user->password = 'changeme';
        $lista_users[] = $user;

        $index = (new UserController)->getUserList($lista_users);
        $this->assertSame($lista_users,  $index);
    }

    /**
     * A test to store users
     *
     * @return void
     */
    public function test_store_user()
    {
        $user = new User();
        $user->id = 1;
        $user->nombre = 'David Felipe ';     

        $data = (new UserController)->createNewUser(null, true);
        $this->assertSame($user->nombre,  $data->nombre);
    }

     /**
     * A test to get user by its id
     *
     * @return void
     */
    public function test_get_user_by_id()
    {
        $user = (new UserController)->createNewUser(null, true);
        $data = (new UserController)->getUserById(null, true);
        $this->assertSame($user->id,  $data->id);
    }

    /**
     * A test to update user by its id
     *
     * @return void
     */
    public function test_get_update_user_by_id()
    {
        $user = (new UserController)->createNewUser(null, true);
        $user->nombre = 'David Felipe';
        $data = (new UserController)->updateUserById(null, 1, true);
        $this->assertSame($user->nombre,  $data->nombre);
    }

}