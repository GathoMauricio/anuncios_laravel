@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p-3">

        <div class="container">
            <a href="{{ route('todo') }}" style="float:right;">Ver todos >></a>
            <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
            <h4>Todos los anuncios</h4>
            <hr>
            <div class="row p-2" style="background-color:#eaeded">
                {{ $anuncios->links('pagination::bootstrap-5') }}
                @forelse ($anuncios as $key => $anuncio)
                    <div class="col-md-3">
                        <div class="card" @if ($anuncio->estatus_id == 2) style="border-color:#d35400;" @endif>
                            <div class="card-header"
                                @if ($anuncio->estatus_id == 2) style="background-color:#d35400; color:white;" @endif>
                                @if ($anuncio->estatus_id == 2)
                                    <span class="icon icon-flag p-1" style="color:yellow;float:right"></span>
                                @endif
                                <a href="{{ route('ver_anuncio', $anuncio->id) }}"
                                    @if ($anuncio->estatus_id == 2) style="color:#aed6f1;" @endif><strong>{{ Str::limit($anuncio->titulo, 25) }}</strong></a>
                                <br>
                                {{--  {{ $anuncio->categoria->nombre }} - {{ $anuncio->subcategoria->nombre }}  --}}
                                {{ Str::limit($anuncio->descripcion, 25) }}
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
                                <span style="float:right">${{ $anuncio->precio }}</span>
                                @php
                                    switch (strlen($anuncio->id)) {
                                        case 1:
                                            echo '0000' . $anuncio->id;
                                            break;
                                        case 2:
                                            echo '000' . $anuncio->id;
                                            break;
                                        case 3:
                                            echo '00' . $anuncio->id;
                                            break;
                                        case 4:
                                            echo '0' . $anuncio->id;
                                            break;
                                        default:
                                            echo $anuncio->id;
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>
                @empty
                    <center>No se encontraron resultados</center>
                @endforelse
            </div>

        </div>
        <br><br>
        @include('layouts.anunciate_aqui')
        <br><br>
        <hr>
        @include('layouts.categorias')
        <br><br>
        <hr>
        @include('layouts.estadisticas')
        <hr>
        <br><br>
        @include('layouts.footer')
    </div>
@endsection
