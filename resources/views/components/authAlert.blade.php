<div class="parallax-index" style="height: 100vh;">
    <br><br><br>
    <div class="card-panel col-md-6 col-sm-8 m-auto  rounded h-auto py-4" style="background-color: #71A9F7">
        <h1 class="header center-align white-text display-4" style="font-size: 3rem;">No estas autorizado para esta
            vista.</h1>
        <div class="row container w-100 pt-4">
            <a
            @isset($url)
                href="{{ $url }}"
            @else
                href="/login"
            @endisset
                class="waves-effect waves-light btn text-white mx-2 m-auto"
                style="background-color: #FF9B42">Regresar</a>
        </div>
    </div>
</div>
