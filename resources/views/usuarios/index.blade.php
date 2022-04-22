@extends('layouts.app')
@section('content')
    @role('Admin')
        <div>
            <div class="parallax-index">
                <br><br><br>
                <div class="bg-light w-50 m-auto p-3 rounded h-50">
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
                                @foreach ($users as $user)
                                    <tr class="table-light">
                                        <td class="table-warning" scope="row"> {{ $user->id }}</td>
                                        <td>{{ $user->nombre }} </td>
                                        <td>{{ $user->apellido }} </td>
                                        <td>{{ $user->email }} </td>
                                        <td><a href="usuarios/{{ $user->id }}" class="btn-small btn-success">View User</a>
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
