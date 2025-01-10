@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p-3">

        <div class="container">
            <a href="{{ route('todo') }}" style="float:right;">Ver todos >></a>
            <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
            <h4>Resultados</h4>
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
                                <br>
                                <span class="text-warning">{{ $anuncio->estado->estado }}</span>
                                @if (request()->session()->get('cliente', 'default_value') != 'flutter')
                                    <div style="float:right;">
                                        <a href="https://wa.me/?text={{ urlencode('¡catinmo.com! ' . $anuncio->titulo . ' ' . route('ver_anuncio', $anuncio->id)) }}"
                                            target="_blank" style="text-decoration: none;color:white;"><span
                                                class="icon icon-share2"></span></a>
                                    </div>
                                    {{--  <div style="float:right;">
                                        <div class="fb-share-button" data-href="{{ route('ver_anuncio', $anuncio->id) }}"
                                            data-layout="button_count" style="display:none;"
                                            id="btn_share_fb_{{ $anuncio->id }}">
                                        </div>
                                        <a href="javascript:void(0)" onclick="modalCompartir({{ $anuncio->id }});"
                                            class="text-info" style="text-decoration: none;"><span
                                                class="icon icon-share2"></span></a>
                                        @include('anuncio.modal_compartir', [
                                            'share_anuncio_id' => $anuncio->id,
                                        ])
                                    </div>  --}}
                                @endif
                            </div>
                            <a href="{{ route('ver_anuncio', $anuncio->id) }}">
                                <div class="card-body">
                                    @if (isset($anuncio->fotos[0]->ruta))
                                        <img src="{{ asset('storage/fotos_anuncios/' . $anuncio->fotos[0]->ruta) }}"
                                            width="100%" height="200">
                                    @else
                                        <img src="https://img.freepik.com/vector-premium/hermoso-diseno-exterior-casa-dibujos-animados-moderna-frente-carretera_646586-582.jpg"
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
