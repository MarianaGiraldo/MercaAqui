@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <form class="col s7">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Pepito" id="nombre" type="text" class="validate">
          <label for="nombre">Nombre</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Perez" id="apellido" type="text" class="validate">
          <label for="apellido">Apellido</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="contraseña" type="password" class="validate">
          <label for="contraseña">Contraseña</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light cyan" type="submit" name="action">Enviar</button>
    </form>
  </div>
    </div>
@endsection