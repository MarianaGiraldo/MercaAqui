@extends('layouts.app')
@section('content')
{{-- @can('indexUsuarios') --}}
<div class="col">
    <h2 class="center-align">Usuarios</h2>
    <table class="highlight">
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Correo</th>
              <th>Contraseña</th>
              <th>Celular</th>
              <th>Fecha de Nacimiento</th>
              <th>Acción</th>
          </tr>
        </thead>

        <tbody>
            <tr>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td><a href="" class="waves-effect waves-light btn">Ver Usuario</a></td>
            </tr>
            <tr>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td><a href="" class="waves-effect waves-light btn">Ver Usuario</a></td>
            </tr>
            <tr>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td>Dato</td>
                <td><a href="" class="waves-effect waves-light btn">Ver Usuario</a></td>
            </tr>
        </tbody>
      </table>
</div>
{{-- @else
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
@endcan --}}
@endsection
