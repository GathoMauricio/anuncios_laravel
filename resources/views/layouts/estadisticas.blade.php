@php
    $num_anuncios = App\Models\Anuncio::count();
    $num_usuarios = App\Models\User::count();
    $num_lugares = App\Models\Municipio::count();
@endphp

<div class="container">
    <div class="row">
        <div class="col-md-4 p-3">
            <center>
                <span class="icon icon-podcast" style="font-size:48px;color:gray;"> {{ $num_anuncios }}</span>
                <h5 style="color:gray;">Anuncios clasificados</h5>
            </center>
        </div>
        <div class="col-md-4 p-3">
            <center>
                <span class="icon icon-users" style="font-size:48px;color:gray;"> {{ $num_usuarios }}</span>
                <h5 style="color:gray;">Vendedores</h5>
            </center>
        </div>
        <div class="col-md-4 p-3">
            <center>
                <span class="icon icon-map" style="font-size:48px;color:gray;"> {{ $num_lugares }}</span>
                <h5 style="color:gray;">Lugares</h5>
            </center>
        </div>
    </div>
</div>
