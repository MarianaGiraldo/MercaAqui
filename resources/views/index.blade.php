@extends('layouts.app')
@section('content')
@hasanyrole('Admin|Vendedor')
<div>
    <div class="parallax-index">
      <br><br><br>
        <div class="bg-light col-md-3 col-sm-8 m-auto p-3 rounded">
            <p class="text-center" style="font-family: Akshar; color:#ff9b42; font-size: 6vh">Merca Aqui</p>
            <p class="text-center" style="font-family: Akshar; color:#ff9b42; font-size: 4vh">El lugar en donde encontrarás lo que necesites</p>

        </div>
    </div>
</div>
<div class="section container">
  <br><br>
  <div class="row">
    <div class="col s6">
      <h1>Productos frescos</h1>
      <br>
      <p>
        Nuestros productos siempre son tratados y transportados de la mejor manera mas inocua posible
        garantizando asi que siempre obtenga un producto fresco directamente traido del campo.
      </p>
      <br><br><br><br>

    </div>
    <div class="col s6 ">
      <img src="imagenes/fresh.jpg" alt="Fresh_img" height="100%" width="100%">
    </div>
  </div>
  <br>
  <div class="row">
      <div class="col s6">
        <img src="imagenes/quality.png" alt="Quality_img" height="100%" width="100%">
      </div>
    <div class="col s6 ">
      <h1>Productos de calidad</h1>
      <br>
      <p>
        Tu alimentacion importa, y por eso nos preocupamos por ofrecer la mejor calidad y variedad en productos
        seleccionados para que siempre tengas lo mejor al alcance de tu mano.
      </p>

    </div>
  </div>
</div>
<br><br><br>

@else
@include('components.authAlert')
@endhasanyrole
@endsection
