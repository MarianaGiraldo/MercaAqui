<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', ['users'=>user::all(), 'fondo'=>'#f6ec9c']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', ['users'=>user::all(), 'fondo'=>'#b8e6cc']);
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
            'correo'=>'required',
            'contraseña'=>'required',
            'celular'=>'required',
            'fecha_nacimiento'=>'required',
        ]);
        $newUser = new user();
        $newUser ->nombre = $request->get('nombre');
        $newUser ->apellido = $request->get('apellido');
        $newUser ->correo = $request->get('correo');
        $newUser ->contraseña = $request->get('contraseña');
        $newUser ->celular = $request->get('celular');
        $newUser ->fecha_nacimiento = $request->get('fecha_nacimiento');

        $newUser -> save();
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
        $userInfo=user::findOrFail($id);
        return view('usuarios.show', [
            'user'=>User::findOrFail($id),
            'users'=>User::all(),
            'fondo'=>'#91a5f5']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::findOrFail($id);
        return view ('usuarios.edit', ['user'=>$user, 'fondo'=>'#b8d2e6']);
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
        $userUpdt ->correo = $request->get('correo');
        $userUpdt ->contraseña = $request->get('contraseña');
        $userUpdt ->celular = $request->get('celular');
        $userUpdt ->fecha_nacimiento = $request->get('fecha_nacimiento');
        $userUpdt -> save();

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
        $dropUser=user::find($id);
        return view('usuarios.drop', ['dropUser'=>$dropUser, 'fondo'=>'#f3d46f']);
    }
}
