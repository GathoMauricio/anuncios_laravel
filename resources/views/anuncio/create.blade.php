@extends('layouts.app')

@section('content')
    @include('layouts.buscador')

    <div class="container">
        <div class="row">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <div class="container p-3" style="background-color:#eaeded">
                    <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
                    <h2> Publicar anuncio</h2>
                    <hr>
                    <form action="{{ route('store_anuncio') }}" id="frm_store_anuncio" class="form" method="POST"
                        enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Categoría</label>
                                    <select name="categoria_id" id="cbo_categoria_id_create"
                                        onchange="subcategorias(this.value)" class="form-select select2">
                                        <option value>Selecciona una categoría</option>
                                        @foreach ($categorias as $key => $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Subcategoria</label>
                                    <select name="subcategoria_id" id="cbo_subcategoria_id_create"
                                        class="form-select select2">
                                        <option value>Selecciona una subcategoría</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Título</label>
                                    <input type="text" name="titulo" id="txt_titulo_create"
                                        placeholder="Título de la publicación..." maxlength="70" class="form-control" />
                                    <small class="text-primary">Este campo acepta hasta 70 caracteres</small>
                                    @error('titulo')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Descripción</label>
                                    <textarea name="deescripcion" id="txt_descripcion_create" maxlength="500" placeholder="Descripción de la publicación..."
                                        class="form-control" /></textarea>
                                    <small class="text-primary">Este campo acepta hasta 500 caracteres</small>
                                    @error('deescripcion')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Recamaras</label>
                                    <input type="number" value="0" name="recamaras" min="0"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Baños</label>
                                    <input type="number" value="0" name="banos" min="0" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Estacionamiento</label>
                                    <input type="number" value="0" name="estacionamiento" min="0"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Niveles</label>
                                    <input type="number" value="0" name="niveles" min="0" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Antiguedad (<i>Años</i>)</label>
                                    <input type="number" value="0" name="antiguedad" min="0"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Precio</label>
                                    <input type="text" name="precio" id="txt_precio_create"
                                        placeholder="Precio de la publicación..." class="form-control" />
                                    @error('precio')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" style="width:60px;height: 30px;" name="negociable"
                                        type="checkbox" id="flexSwitchCheckDefault">
                                    <div class="p-2">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">
                                            <strong>
                                                &nbsp;&nbsp;&nbsp;
                                                ¿El precio es
                                                negociable?
                                            </strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <strong>Dirección</strong>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <select name="estado_id" id="cbo_estado_create" class="form-select select2"
                                        onchange="municipiosCreate(this.value)">
                                        <option value>¿Estado?</option>
                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->idestado }}">{{ $estado->estado }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <select name="municipio_id" id="cbo_municipio_create" class="form-select select2"
                                        onchange="coloniasCreate(this.value)">
                                        <option value>¿Municipio?</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <select name="colonia_id" id="cbo_colonia_create" class="form-select select2"
                                        onchange="cpCreate(this.value)">
                                        <option value>¿Colonia?</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Código postal</label>
                                    <input type="text" name="cp" placeholder="CP..." id="txt_cp_create"
                                        class="form-control" readonly />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Calle y número</label>
                                    <input type="text" name="calle_numero" placeholder="Calle y número..."
                                        id="txt_calle_numero_create" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <h6>
                                <a href="javascript:void(0);" onclick="agregarImagen();" style="float:right;">
                                    + Agregar imagen
                                </a>
                                <strong>Imágenes</strong>
                            </h6>
                            <hr>
                            <div class="container" id="container_imagenes">
                                <center>
                                    No se ha seleccionado ninguna imagen
                                    <br><br>
                                    <a href="javascript:void(0);" onclick="agregarImagen();" class="btn btn-primary">
                                        + Agregar imagen
                                    </a>
                                </center>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Tipo de anuncio</label>
                                    <br>
                                    <select class="form-select" id="cbo_tipo_anuncio">
                                        <option value="gratis">Gratis (El anuncio se puede destacar más adelante)</option>
                                        <option value="stripe">Pago con Tarjeta</option>
                                        <option value="spei">Pago via SPEI</option>
                                        <option value="oxxo">Pago en Oxxo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group p-2">

                                <div class="form-check form-switch">
                                    <input class="form-check-input" style="width:60px;height: 30px;" name="borrador"
                                        type="checkbox" id="flexSwitchCheckDefault">
                                    <div class="p-2">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">
                                            <strong>
                                                &nbsp;&nbsp;&nbsp;
                                                ¿Guardar como borrador?
                                            </strong>
                                        </label>
                                    </div>
                                </div>
                                {{--  <div class="form-check form-switch">
                                    <input class="form-check-input" style="width:60px;height: 30px;" name="premium"
                                        type="checkbox" id="flexSwitchCheckDefaultPremium">

                                    <label class="form-check-label" for="flexSwitchCheckDefaultPremium">
                                        <strong>
                                            &nbsp;&nbsp;&nbsp;
                                            ¿Hacer Premium?
                                        </strong>
                                    </label>
                                    <div id="html_element"></div>
                                </div>  --}}
                                <button class="g-recaptcha btn btn-danger"
                                    data-sitekey="6LdRUGoqAAAAAFNxt75SbQ-Lqpd0TOgDbhklJQ-K"
                                    data-callback='validarCrearAnuncio' data-action='submit'
                                    style="background-color: brown;float:right;">
                                    Crear anuncio
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 p-3" style="background-color:#eaeded">
                <img src="{{ asset('img/publica.png') }}" width="100%">
                <br><br>
                <img src="{{ asset('img/como.png') }}" width="100%">
                <br><br>
                <div id="map" style="width: 100%; height:300px;"></div>
            </div>
        </div>
        <hr>
        <br><br>
        @include('layouts.footer')
    </div>
    @include('anuncio.confirmacion')
    @include('anuncio.modal_spei_data')
    @include('anuncio.modal_oxxo_data')
@endsection
@section('custom_js')
    <script>
        function iniciarMap() {
            var coord = {
                lat: 19.3744195,
                lng: -99.1496103
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 19,
                center: coord
            });
            var marker = new google.maps.Marker({
                position: coord,
                map: map
            });
        }

        function municipiosCreate(id) {
            $("#cbo_municipio_create").html('<option value>¿Municipio?</option>');
            $("#cbo_colonia_create").html('<option value>Colonia?</option>');
            $("#txt_cp_create").val('');
            if (id.length > 0) {
                axios.get('{{ route('municipios') }}/' + id).then(function(response) {
                    var html = '<option value>¿Municipio?</option>';
                    $.each(response.data, function(index, item) {
                        html += '<option value="' + item.idmunicipio + '">' + item.municipio + '</option>';
                    });
                    $("#cbo_municipio_create").html(html);
                });
            }
        }

        function coloniasCreate(id) {
            $("#cbo_colonia_create").html('<option value>Colonia?</option>');
            $("#txt_cp_create").val('');
            if (id.length > 0) {
                axios.get('{{ route('colonias') }}/' + id).then(function(response) {
                    var html = '<option value>¿Colonia?</option>';
                    $.each(response.data, function(index, item) {
                        html += '<option value="' + item.idcp + '">' + item.colonia + '</option>';
                    });
                    $("#cbo_colonia_create").html(html);
                });
            }
        }

        function cpCreate(id) {
            $("#txt_cp_create").val('');
            if (id.length > 0) {
                axios.get('{{ route('cp') }}/' + id).then(function(response) {
                    $("#txt_cp_create").val(response.data.cp);
                });
            }
        }

        function subcategorias(id) {
            $("#cbo_subcategoria_id_create").html('<option value>Selecciona una subcategoría</option>');
            if (id.length > 0) {
                axios.get('{{ route('subcategorias') }}/' + id).then(function(response) {
                    var html = '<option value>Selecciona una subcategoría</option>';
                    $.each(response.data, function(index, item) {
                        html += '<option value="' + item.id + '">' + item.nombre + '</option>';
                    });
                    $("#cbo_subcategoria_id_create").html(html);
                });
            }
        }

        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoB6rmriGlDHt3t28H3DSvSMOU6h35gL8&callback=iniciarMap&loading=async">
    </script>
@endsection
