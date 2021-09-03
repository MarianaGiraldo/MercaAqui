<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.index', ['users'=>User::all(), 'fondo'=>'fondo1.jpg']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create', ['users'=>User::all(), 'fondo'=>'fondo1.jpg']);
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
            'contrasena'=>'required',
            'celular'=>'required',
            'fecha_nacimiento'=>'required',
            'tipo'=>'required',
        ]);
        $newUser = new User();
        $newUser ->nombre = $request->get('nombre');
        $newUser ->apellido = $request->get('apellido');
        $newUser ->correo = $request->get('correo');
        $newUser ->contrasena = $request->get('contrasena');
        $newUser ->celular = $request->get('celular');
        $newUser ->fecha_nacimiento = $request->get('fecha_nacimiento');
        $newUser ->tipo = $request->get('tipo');

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
        $userInfo=User::findOrFail($id);
        return view('usuarios.show', [
            'user'=>$userInfo,
            'users'=>User::all(),
            'fondo'=>'fondo1.jpg']);
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
        return view ('usuarios.edit', ['user'=>$user, 'fondo'=>'fondo1.jpg']);
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
        $userUpdt ->contrasena = $request->get('contrasena');
        $userUpdt ->celular = $request->get('celular');
        $userUpdt ->fecha_nacimiento = $request->get('fecha_nacimiento');
        $userUpdt ->tipo = $request->get('tipo');
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
        $dropUser=User::find($id);
        return view('usuarios.drop', ['dropUser'=>$dropUser, 'fondo'=>'fondo1.jpg']);
    }
}
