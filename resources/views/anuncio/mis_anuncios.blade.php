@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
                <h2>Mis anuncios</h2>
                {{ $anuncios->links('pagination::bootstrap-5') }}
                <div style="width: 100%;overflow:hidden;overflow-x:scroll;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Estatus</th>
                                <th>Título</th>
                                {{--  <th>Descripcion</th>  --}}
                                <th>Precio</th>
                                <th>Borrador</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($anuncios as $anuncio)
                                <tr>
                                    <td>
                                        <strong>
                                            @php
                                                switch (strlen($anuncio->id)) {
                                                    case 1:
                                                        echo '3000' . $anuncio->id;
                                                        break;
                                                    case 2:
                                                        echo '300' . $anuncio->id;
                                                        break;
                                                    case 3:
                                                        echo '30' . $anuncio->id;
                                                        break;
                                                    case 4:
                                                        echo '3' . $anuncio->id;
                                                        break;
                                                    default:
                                                        echo $anuncio->id;
                                                }
                                            @endphp
                                        </strong>
                                    </td>
                                    <td>
                                        {{ $anuncio->estatus->nombre }}
                                        {{--  @if ($anuncio->estatus->id == 1)
                                        <br>
                                        <a href="{{ route('hacer_premium', $anuncio->id) }}">
                                            <label class="bg-warning p-1 text-light"
                                                style="border-radius:5px;font-size:10px;">
                                                <span class="icon icon-star-full"></span>Hacer Premium
                                            </label>
                                        </a>
                                    @endif  --}}
                                    </td>
                                    <td>{{ $anuncio->titulo }}</td>
                                    {{--  <td>{{ $anuncio->descripcion }}</td>  --}}
                                    <td>${{ number_format($anuncio->precio, 0, '', ',') }} {{ $anuncio->divisa }}</td>
                                    <td>{{ $anuncio->borrador }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <a href="{{ route('ver_anuncio', [$anuncio->id, \Str::slug($anuncio->titulo)]) }}"
                                                        title="Ver" class="btn btn-primary"><span
                                                            class="icon icon-eye"></span></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('editar_anuncio', $anuncio->id) }}" title="Editar"
                                                        class="btn btn-warning" style="color:white"><span
                                                            class="icon icon-pencil"></span></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="20%">
                                        @if ($anuncio->estatus->id == 1)
                                            <a href="{{ route('hacer_premium', $anuncio->id) }}">
                                                <label class="bg-warning p-1 text-light"
                                                    style="border-radius:5px;font-size:10px;">
                                                    <span class="icon icon-star-full"></span>Hacer Premium con TDD
                                                </label>
                                            </a>
                                            <br>
                                            <a href="javascript:void(0)" onclick="modalSpeiData({{ $anuncio->id }});">
                                                <label class="bg-warning p-1 text-light"
                                                    style="border-radius:5px;font-size:10px;">
                                                    <span class="icon icon-star-full"></span>Hacer Premium con SPEI
                                                </label>
                                            </a>
                                            <br>
                                            <a href="javascript:void(0)" onclick="modalOxxoData({{ $anuncio->id }});">
                                                <label class="bg-warning p-1 text-light"
                                                    style="border-radius:5px;font-size:10px;">
                                                    <span class="icon icon-star-full"></span>Hacer Premium con Oxxo
                                                </label>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No se ha creado nungún anuncio</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3 p-3" style="background-color:#eaeded">
                <img src="{{ asset('img/publica.png') }}" width="100%">
                {{--  <div class="card">
                    <div class="card-header" style="background-color:brown;color:white">
                        Convierte tu anuncio Premium
                        <h6>DESTÁCALO</h6>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>En los primeros lugares de su categoría</li>
                            <li>Triple de visitas</li>
                            <li>Hasta 20 fotos</li>
                            <li>Durante 30 días</li>
                            <li>Solo por $399.00 mxn</li>
                        </ul>
                        Pago con Tarjeta por medio de <a href="https://stripe.com/mx" target="_BLANK"><img
                                src="{{ asset('img/stripe.png') }}" width="60"></a>, <a
                            href="https://www.oxxo.com/oxxo-pay" target="_BLANK"><img src="{{ asset('img/oxxo.png') }}"
                                width="60"></a>
                        o Transferencia electrónica <a
                            href="https://www.banxico.org.mx/servicios/sistema-pagos-electronicos-in.html"
                            target="_BLANK"><img src="{{ asset('img/spei.png') }}" width="40"></a>
                    </div>
                </div>  --}}
                <br><br>
                <img src="{{ asset('img/como.png') }}" width="100%">
            </div>
        </div>
        <hr>
        <br><br>
        @include('layouts.footer')
    </div>
    @include('anuncio.modal_ver_foto')
    @include('anuncio.modal_spei_data')
    @include('anuncio.modal_oxxo_data')
@endsection
@section('custom_js')
    <script>
        function modalSpeiData(anuncio_id) {
            $("#modal_spei_data").modal('show');
            $("#span_spein_id").text(anuncio_id);
        }

        function modalOxxoData(anuncio_id) {
            $("#modal_oxxo_data").modal('show');
            $("#span_oxxo_id").text(anuncio_id);
            $("#span_concepto_santander_id").text(anuncio_id);
            $("#span_concepto_hsbc_id").text(anuncio_id);
        }
    </script>
@endsection
