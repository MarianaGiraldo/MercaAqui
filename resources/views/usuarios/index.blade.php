@extends('layouts.app')
@section('content')
@role('Admin')
<div>
    <div class="parallax-index" style="height: 100vh">
        <br><br><br>
        <div class="bg-light col-lg-6 col-md-10 col-sm-10 m-auto pb-3 pr-0 pl-3 rounded h-75">
            <div class="col overflow-auto h-100">
                <h2 class="table-title center-align sticky-top bg-light">Vendedores</h2>
                @if ($errors->any())
                <div class="w-75 mx-auto">
                    <div class="alert alert-danger  my-1" role="alert"> Error! Usuario no eliminado </div>
                    <ul class="list-group-flush">
                        @foreach($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{$error}} </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row center m-auto">
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th class="id-col-table" style="width: 28px;">ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Ver más</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="table-light">
                                <td class="table-warning" scope="row"> {{ $user->id }}</td>
                                <td>{{ $user->nombre }} </td>
                                <td>{{ $user->apellido }} </td>
                                <td>{{ $user->email }} </td>
                                <td><a href="usuarios/{{ $user->id }}" class="text-white btn btn-small" style="background-color: #FF9B42">View User</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container accordion mt-2" >
            <a href="usuarios/create" class="float">
                <i class="fa fa-plus my-float"></i>
            </a>
        </div>
    </div>
</div>
@else
@include('components.authAlert')
@endrole
@endsection