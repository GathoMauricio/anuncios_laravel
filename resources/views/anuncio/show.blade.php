@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
                <h2>
                    Detalle del anuncio
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
                </h2>
                @if (Auth::check() && $anuncio->user_id == Auth()->user()->id)
                    Este anuncio es {{ $anuncio->estatus->nombre }}
                @endif
                <hr>
                <strong>Categoria: </strong>{{ $anuncio->categoria->nombre }}
                <br>
                <strong>Subcategoria: </strong>{{ $anuncio->subcategoria->nombre }}
                <hr>
                <h4>{{ $anuncio->titulo }}</h4>
                <p>{{ $anuncio->descripcion }}</p>
                <hr>
                <strong>Recamaras: </strong>{{ $anuncio->recamaras }} -
                <strong>Baños: </strong>{{ $anuncio->banos }} -
                <strong>Estacionamiento: </strong>{{ $anuncio->estacionamiento }} -
                <strong>Niveles: </strong>{{ $anuncio->niveles }} -
                <strong>Antiguedad: </strong>{{ $anuncio->antiguedad }} años
                <hr>
                <div class="container">
                    <div class="row">
                        @foreach ($anuncio->fotos as $key => $foto)
                            <div class="col-md-4" onclick="verFoto('{{ asset('storage/fotos_anuncios/' . $foto->ruta) }}')"
                                style="cursor:pointer;">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('storage/fotos_anuncios/' . $foto->ruta) }}" width="100%"
                                            height="200">
                                    </div>
                                    <div class="card-footer">
                                        {{ $foto->descripcion }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <br>
                <strong>Precio: ${{ $anuncio->precio }}
                    @if ($anuncio->negociable)
                        Precio negociable
                    @endif
                </strong>
                <br><br>
                <strong>Dirección: </strong>
                {{ $anuncio->estado->estado }},
                {{--  @if ($anuncio->municipio->municipio != 'Jiménez')
                    {{ $anuncio->municipio->municipio }},
                @endif  --}}
                {{ $anuncio->colonia->colonia }}.
                {{ $anuncio->calle_numero }},
                CP
                @if (strlen($anuncio->cp) <= 4)
                    0{{ $anuncio->cp }}
                @else
                    {{ $anuncio->cp }}
                @endif
                <br>

                <br>
                <strong>Contacto</strong>
                <br>
                <strong>Nombre: </strong> {{ $anuncio->cliente->name }} {{ $anuncio->cliente->apaterno }}
                {{ $anuncio->cliente->amaterno }}
                @if ($anuncio->cliente->telefono)
                    <br>
                    <strong>Teléfono: </strong><a
                        href="tel:{{ $anuncio->cliente->telefono }}">{{ $anuncio->cliente->telefono }}</a>
                @endif
                <br>
                <strong>Email: </strong><a href="mailto:{{ $anuncio->cliente->email }}">{{ $anuncio->cliente->email }}</a>
                <br>
                @php
                    // Webservices
                    $google_maps_url =
                        'https://maps.googleapis.com/maps/api/geocode/json?address=' .
                        '' .
                        urlencode(
                            $anuncio->calle_numero .
                                ' ' .
                                $anuncio->colonia->colonia .
                                ' ' .
                                $anuncio->estado->estado .
                                ' cp ' .
                                $anuncio->cp,
                        ) .
                        '&key=AIzaSyBoB6rmriGlDHt3t28H3DSvSMOU6h35gL8';
                    $google_maps_json = file_get_contents($google_maps_url);
                    $google_maps_array = json_decode($google_maps_json, true);
                    //print_r($google_maps_array['results'][0]['geometry']['location']);
                    //echo '<br>';
                    //echo array_key_exists('location', $google_maps_array['results'][0]['geometry']);

                    if (array_key_exists('location', $google_maps_array['results'][0]['geometry'])) {
                        //print_r($google_maps_array['results'][0]['geometry']['location']);
                        $mapa_lat = $google_maps_array['results'][0]['geometry']['location']['lat'];
                        //echo 'Lat: ' . $mapa_lat;
                        //echo '<br><br>';
                        $mapa_lng = $google_maps_array['results'][0]['geometry']['location']['lng'];
                        //echo 'Lng: ' . $mapa_lng;
                    } else {
                        //print_r($google_maps_array['results'][0]['geometry']['bounds']['northeast']);
                        $mapa_lat = $google_maps_array['results'][0]['geometry']['bounds']['northeast']['lat'];
                        //echo 'Lat: ' . $mapa_lat;
                        //echo '<br><br>';
                        $mapa_lng = $google_maps_array['results'][0]['geometry']['bounds']['northeast']['lng'];
                        //echo 'Lng: ' . $mapa_lng;
                    }
                    /*
                    echo '<br><br>';
                    echo urlencode(
                        $anuncio->calle_numero .
                            ' ' .
                            $anuncio->colonia->colonia .
                            ' ' .
                            $anuncio->municipio->municipio .
                            ' ' .
                            $anuncio->estado->estado .
                            ' cp ' .
                            $anuncio->cp,
                    );
                    */
                @endphp
                <br>
                <div id="map" style="width: 100%; height:400px;"></div>
                <br>
                <center>
                    <a href="mailto:{{ $anuncio->cliente->email }}" class="btn btn-danger"
                        style="background-color: brown;">Contactar al autor</a>
                </center>
            </div>
            <div class="col-md-3 p-3" style="background-color:#eaeded">
                @if (Auth::check() && $anuncio->user_id == Auth()->user()->id && $anuncio->estatus_id == 1)
                    <div class="card">
                        <div class="card-header text-center" style="background-color:brown;color:white">
                            Convierte tu anuncio en
                            <label class="text-warning" style="font-size:14px;">
                                <span class="icon icon-star-full"></span>Premium
                            </label>
                            <br>
                            y
                            <br>
                            <a href="{{ route('hacer_premium', $anuncio->id) }}" class="btn btn-danger">DESTÁCALO
                                AHORA</a>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>En los primeros lugares de su categoría</li>
                                <li>Triple de visitas</li>
                                <li>Hasta 20 fotos</li>
                                <li>Durante 30 días</li>
                                <li>Solo por $399.00 mxn</li>
                            </ul>
                            Pago con Tarjeta por medio de <a href="{{ route('hacer_premium', $anuncio->id) }}"><img
                                    src="{{ asset('img/stripe.png') }}" width="60"></a>, <a href="javascript:void(0)"
                                onclick="modalOxxoData();"><img src="{{ asset('img/oxxo.png') }}" width="60"></a>
                            o Transferencia electrónica <a href="javascript:void(0)" onclick="modalSpeiData();"><img
                                    src="{{ asset('img/spei.png') }}" width="40"></a>
                        </div>
                    </div>
                    <br>
                @endif
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
    @include('anuncio.modal_spei_data')
    @include('anuncio.modal_oxxo_data')
@endsection
@section('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/fabric"></script>
    <script>
        function modalSpeiData() {
            $("#modal_spei_data").modal('show');
        }

        function modalOxxoData() {
            $("#modal_oxxo_data").modal('show');
        }

        function verFoto(url_foto) {
            console.log(url_foto);
            $("#img_ver_foto").prop('src', url_foto);
            $("#modal_ver_foto").css("display", "block");
        }

        function ocultarFoto() {
            $("#modal_ver_foto").css("display", "none");
        }

        function iniciarMap() {
            var coord = {
                lat: {{ $mapa_lat }},
                lng: {{ $mapa_lng }}
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: coord
            });
            var marker = new google.maps.Marker({
                position: coord,
                map: map
            });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoB6rmriGlDHt3t28H3DSvSMOU6h35gL8&callback=iniciarMap&loading=async">
    </script>
@endsection
