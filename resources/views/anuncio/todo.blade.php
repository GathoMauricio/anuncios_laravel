@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p-3">

        <div class="container">
            <a href="{{ route('todo') }}" style="float:right;">Ver todos >></a>
            <h4>Todos los anuncios</h4>
            <hr>
            <div class="row p-2" style="background-color:#eaeded">
                {{ $anuncios->links('pagination::bootstrap-5') }}
                @forelse ($anuncios as $key => $anuncio)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('ver_anuncio', $anuncio->id) }}">{{ $anuncio->titulo }}</a>
                                <br>
                                {{ $anuncio->categoria->nombre }} - {{ $anuncio->subcategoria->nombre }}
                            </div>
                            <a href="{{ route('ver_anuncio', $anuncio->id) }}">
                                <div class="card-body">
                                    @if (isset($anuncio->fotos[0]->ruta))
                                        <img src="{{ asset('storage/fotos_anuncios/' . $anuncio->fotos[0]->ruta) }}"
                                            width="100%" height="200">
                                    @else
                                        <img src="{{ asset('https://images.adsttc.com/media/images/528c/a1a0/e8e4/4efc/1f00/00c3/newsletter/IMG_6201.jpg') }}"
                                            width="100%" height="200">
                                    @endif
                                </div>
                            </a>
                            <div class="card-footer">
                                ${{ $anuncio->precio }}
                            </div>
                        </div>
                    </div>
                @empty
                    <center>No se encontraron resultados</center>
                @endforelse
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
