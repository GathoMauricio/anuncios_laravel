@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p-3">

        <div class="container">
            <a href="#" style="float:right;">Ver todos >></a>
            <h4>Últimos anuncios</h4>
            <hr>
            <div class="row p-2" style="background-color:#eaeded">
                @foreach ($anuncios as $key => $anuncio)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('ver_anuncio', $anuncio->id) }}">{{ $anuncio->titulo }}</a>
                                <br>
                                {{ $anuncio->categoria->nombre }} - {{ $anuncio->subcategoria->nombre }}
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <img src="https://images.adsttc.com/media/images/5d34/e507/284d/d109/5600/0240/newsletter/_FI.jpg?1563747560"
                                        width="100%" height="200">
                                </div>
                            </div>
                            <div class="card-footer">
                                ${{ $anuncio->precio }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <br><br>
        <img src="{{ asset('img/categorias.png') }}" width="100%">
        <br><br>
        <img src="{{ asset('img/estadisticas.png') }}" width="100%">
        <br><br>
        <img src="{{ asset('img/footer.png') }}" width="100%">
    </div>
@endsection
