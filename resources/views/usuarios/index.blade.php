@extends('layouts.app')
@section('content')
    @role('Admin')
        <div>
            <div class="parallax-index">
                <br><br><br>
                <div class="bg-light col-md-6 col-sm-8 m-auto pb-3 pr-0 pl-3 rounded h-75" style=" ">
                    <div class="col h-100" style="overflow-x: hidden;">
                        <h2 class="table-title center-align sticky-top bg-light">Vendedores</h2>
                        <table class="highlight" style="">
                            <thead>
                                <tr>
                                    <th class="id-col-table">ID</th>
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
                                        <td><a href="usuarios/{{ $user->id }}" class="text-white btn btn-small"
                                                style="background-color: #FF9B42">View User</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container w-75 pr-5">
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
