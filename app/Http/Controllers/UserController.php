<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = $this->getUserList();
        return view('usuarios.index', ['users'=> $lista, 'fondo'=>'fondo2.jpg']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create', ['users'=>User::all(), 'fondo'=>'fondo2.jpg']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'email'=>'required',
            'password'=>'required',
            'celular'=>'required',
            'fecha_nacimiento'=>'required',
        ]);
       

        $newUser -> $this->createNewUser($request);
        $newUser -> save();
        $newUser->assignRole('Vendedor');
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userInfo=User::findOrFail($id);
        return view('usuarios.show', [
            'user'=>$userInfo,
            'fondo'=>'fondo2.jpg']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view ('usuarios.edit', ['user'=>$user, 'fondo'=>'fondo2.jpg']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userUpdt = User::find($id);
        $userUpdt ->nombre = $request->get('nombre');
        $userUpdt ->apellido = $request->get('apellido');
        $userUpdt ->email = $request->get('email');
        $userUpdt ->celular = $request->get('celular');
        $userUpdt ->fecha_nacimiento = $request->get('fecha_nacimiento');
        if ($request->password != null ) {
            $userUpdt ->password = Hash::make($request->get('password'));
        };
        if ($request->is_admin != null ) {
            $is_admin = $request->is_admin === 'true' ? true: false;
            $userUpdt ->is_admin = $is_admin;
        };
        $userUpdt -> save();

        if ($userUpdt->is_admin) {
            $userUpdt->assignRole('Admin');
        }else {
            $userUpdt->assignRole('Vendedor');
        }

        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/usuarios');
    }
    public function drop($id)
    {
        $dropUser=User::findOrFail($id);
        return view('usuarios.drop', ['dropUser'=>$dropUser, 'fondo'=>'fondo2.jpg']);
    }

    public function getUserList($lista = null)
    {
        return $lista ?? User::where('is_admin', 0)->get();
    }

    public function createNewUser($request = null, $flag_test = false)
    {
        $user = new User();
        if (isset($request)) {
            $newUser = new User();
            $newUser ->nombre = $request->get('nombre');
            $newUser ->apellido = $request->get('apellido');
            $newUser ->email = $request->get('email');
            $newUser ->password = $request->get('password');
            $newUser ->celular = $request->get('celular');
            $newUser ->fecha_nacimiento = $request->get('fecha_nacimiento');
        } elseif ($flag_test) {
            $user->id = 1;
            $user->nombre = 'David Felipe ';
            $user->apellido = 'Castro Herrera';
            $user->celular = '3192154875';
            $user->fecha_nacimiento = '1997-12-11';
            $user->correo = 'castroherreradavid@gmail.com';
            $user->password = 'changeme';
        }
        return $user;
    }
    /**
     * A test to get user by its id
     *
     * @return void
     */
    public function getUserById($id = null, $flag_test = false)
    {
        if (isset($id)) {
            return User::findOrFail($id);
        } elseif ($flag_test) {
           return $this->createNewUser(null, $flag_test);
        }
    }
    /**
     * A test to get update user 
     *
     * @return void
     */
    public function updateUserById($request, $id, $flag_test = false)
    {
        if ($request !== null) {
            $userUpdt = $this->getUserById($id);
            $userUpdt ->nombre = $request->get('nombre');
            $userUpdt ->apellido = $request->get('apellido');
            $userUpdt ->email = $request->get('email');
            $userUpdt ->celular = $request->get('celular');
            $userUpdt ->fecha_nacimiento = $request->get('fecha_nacimiento');
            if ($request->password != null ) {
                $userUpdt ->password = Hash::make($request->get('password'));
            };
            if ($request->is_admin != null ) {
                $is_admin = $request->is_admin === 'true' ? true: false;
                $userUpdt ->is_admin = $is_admin;
            };
        }elseif ($flag_test) {
            $userUpdt = $this->getUserById(null, $flag_test);
            $userUpdt->id = 1;
            $userUpdt->nombre = 'David Felipe';
            $userUpdt->apellido = 'Castro Herrera';
            $userUpdt->celular = '3192154875';
            $userUpdt->fecha_nacimiento = '1997-12-11';
            $userUpdt->correo = 'castroherreradavid@gmail.com';
            $userUpdt->password = 'changeme';
        }
        return $userUpdt;
    }
}


