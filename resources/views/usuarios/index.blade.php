@extends('layouts.app')
@section('content')
@role('Admin')
<div class="parallax-container mt-0">
    <div class="parallax-index">
        <br><br><br>
        <div class="bg-light w-50 m-auto p-1 rounded h-50">
            <div class="col overflow-auto h-100">
                <h2 class="center-align sticky-top bg-light">Vendedores</h2>
                <table class="highlight">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Correo</th>
                          <th>Ver más</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr class="table-light">
                            <td class="table-warning" scope="row" > {{$user->id}}</td>
                            <td >{{$user->nombre}} </td>
                            <td >{{$user->apellido}} </td>
                            <td >{{$user->email}} </td>
                            <td><a href="usuarios/{{$user->id}}" class="btn-small btn-success">View User</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="container w-75 pr-5">
            <a class="btn-floating btn-large waves-effect waves-light red right pt-2" style="width: 6vw; height: 6vw;" href="usuarios/create"><i class="material-icons large" style="font-size: 6vw">add</i></a>
        </div>
    </div>
</div>

@else
<br><br>
<div class="row center container w-50 m-auto">
<div class="col s6 m6">
      <div class="card red lighten-2">
        <div class="card-content white-text">
          <span class="card-title">No estas autorizado para esta vista.</span>
        </div>
        <div class="card-action">
          <a href="/" class="waves-effect waves-light btn blue lighten-3">Regresar</a>
        </div>
      </div>
    </div>
</div>
@endrole
@endsection
