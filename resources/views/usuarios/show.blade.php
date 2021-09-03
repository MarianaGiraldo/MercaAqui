@extends('layouts.appLayout')
@section('content')
<div class="row">
    <div class="col s12 m6">
      <div class="card teal lighten-3">
        <div class="card-content white-text">
          <span class="card-title">Información del usuario {{$user->id}}</span>
            <h5>Nombre:</h5>
            <p>{{$user->nombre}}</p>  

            <h5>Apellido:</h5>
            <p>{{$user->apellido}}</p>

            <h5>Correo:</h5>
            <p>{{$user->correo}}</p>

            <h5>Contraseña:</h5>
            <details>
                <summary>Mostrar Contraseña:
                <p>{{$user->contrasena}}</p>
                </summary>                    
            </details>

            <h5>Celular:</h5>
            <p>{{$user->celular}}</p>

            <h5>Fecha de nacimiento:</h5>
            <p>{{$user->fecha_nacimiento}}</p>
        </div>
        <div class="card-action">
          <a href="/usuarios/{{$user->id}}/edit" class="waves-effect waves-light btn">Editar</a>
          <a href="/usuarios/{{$user->id}}/drop" class="waves-effect waves-light btn right">Borrar</a>
        </div>
      </div>
    </div>
  </div>

  <a href="/usuarios" class="waves-effect waves-light btn right">Regresar</a>


      
    
@endsection