@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
                <h2>Denuncias</h2>
                {{ $denuncias->links('pagination::bootstrap-5') }}
                <div style="width: 100%;overflow:hidden;overflow-x:scroll;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Folio</th>
                                <th>Motivo</th>
                                <th>IP</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($denuncias as $denuncia)
                                <tr>
                                    <td>
                                        {{ explode(' ', $denuncia->created_at)[0] }}
                                    </td>
                                    <td>
                                        @php
                                            switch (strlen($denuncia->anuncio->id)) {
                                                case 1:
                                                    echo '0000' . $denuncia->anuncio->id;
                                                    break;
                                                case 2:
                                                    echo '000' . $denuncia->anuncio->id;
                                                    break;
                                                case 3:
                                                    echo '00' . $denuncia->anuncio->id;
                                                    break;
                                                case 4:
                                                    echo '0' . $denuncia->anuncio->id;
                                                    break;
                                                default:
                                                    echo $denuncia->anuncio->id;
                                            }
                                        @endphp
                                    </td>
                                    <td>{{ $denuncia->motivo }}</td>
                                    <td>{{ $denuncia->ip }}</td>
                                    <td>
                                        <a href="{{ route('ver_anuncio', [$anuncio->id, \Str::slug($anuncio->titulo)]) }}">Ver
                                            anuncio</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Sin registros</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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
