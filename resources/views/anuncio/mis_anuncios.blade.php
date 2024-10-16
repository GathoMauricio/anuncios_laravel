@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
                <h2>Mis anuncios</h2>
                {{ $anuncios->links('pagination::bootstrap-5') }}
                <table class="table">
                    <thead>
                        <tr>
                            <th>Estatus</th>
                            <th>Título</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Borrador</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anuncios as $anuncio)
                            <tr>
                                <td>
                                    {{ $anuncio->estatus->nombre }}
                                    @if ($anuncio->estatus->id == 1)
                                        <br>
                                        <a href="{{ route('hacer_premium', $anuncio->id) }}">
                                            <label class="bg-warning p-1 text-light" style="border-radius:5px;">
                                                <span class="icon icon-star-full"></span>Premium
                                            </label>
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $anuncio->titulo }}</td>
                                <td>{{ $anuncio->descripcion }}</td>
                                <td>${{ $anuncio->precio }}</td>
                                <td>{{ $anuncio->borrador }}</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="{{ route('ver_anuncio', $anuncio->id) }}" title="Ver"
                                                    class="btn btn-primary"><span class="icon icon-eye"></span></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('editar_anuncio', $anuncio->id) }}" title="Editar"
                                                    class="btn btn-warning" style="color:white"><span
                                                        class="icon icon-pencil"></span></a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No se ha creado nungún anuncio</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 p-3" style="background-color:#eaeded">
                <img src="{{ asset('img/publica.png') }}" width="100%">
                <br><br>
                <img src="{{ asset('img/como.png') }}" width="100%">
            </div>
        </div>
        <hr>
        <br><br>
        @include('layouts.footer')
    </div>
    @include('anuncio.modal_ver_foto')
@endsection
@section('custom_js')
@endsection
