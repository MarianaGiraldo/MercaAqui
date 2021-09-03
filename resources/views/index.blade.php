@extends('layouts.app')
@section('content')
@can('menuHome')

<div class="parallax-container mt-0">
    <div class="parallax-index">
        <br>
        <br>
        <br>
        <div class="bg-light w-25 m-auto p-3 rounded">
            <p class="text-center" style="font-family: MarkingPen; color:#f7941d; font-size: 6vh">Merca Aqui</p>
            <p class="text-center" style="font-family: MarkingPen; color:#f7941d; font-size: 4vh">El lugar en donde encontrarás lo que necesites</p>

        </div>
    </div>
</div>
<div class="section container">
    <h1>Home</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ab architecto doloribus nihil, sunt debitis beatae voluptas similique sint earum blanditiis ullam ad? Nobis incidunt assumenda cum, ab molestias nam?</p>
    <br><br><br><br>
</div>
@else
<div class="row center">
<div class="col s12 m6">
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
