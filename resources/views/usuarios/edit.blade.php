@extends('layouts.app')
@section('content')
@can('usuarios.edit')
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
      @can('productos.drop')<button class="btn waves-effect waves-light cyan" type="submit" name="action">Enviar</button>@endcan
    </form>
  </div>
  <div class="col s2"></div>
@else
<br><br>
<div class="row center container w-50 m-auto">
<div class="col s6 m6">
      <div class="card red lighten-2">
        <div class="card-content white-text">
          <span class="card-title">No estas autorizado para esta vista.</span>
        </div>
        <div class="card-action">
          <a href="/login" class="waves-effect waves-light btn blue lighten-3">Regresar</a>
        </div>
      </div>
    </div>
</div>
@endcan
@endsection
