@extends('layouts.appLayout')
@section('content')
{{-- @can('verRegistro') --}}
<div class="row">
    <div class="col s2"></div>
    <form class="col s8">
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
          <input placeholder="No uses contraseña123" id="contrasena" type="password" class="validate">
          <label for="contrasena">Contraseña</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Celular" id="celular" type="text" class="validate">
          <label for="celular">Celular</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="correodeejemplo@correo.com" id="correo" type="email" class="validate">
          <label for="correo">Correo</label>
        </div>
      </div>
      <div class="row">
            <select class="browser-default">
                <option value="" disabled selected>Tipo de usuario</option>
                <option value="1">Administrador</option>
                <option value="2">Vendedor</option>
            </select>
      </div>
      {{-- @can('eliminarProducto')<button class="btn waves-effect waves-light cyan" type="submit" name="action">Enviar</button>@endcan --}}
    </form>
  </div>
  <div class="col s2"></div>
{{-- @else
  <div class="row">
    <a href="/">No estas autorizado, regresar al Home</a>
  </div>
@endcan --}}
@endsection
