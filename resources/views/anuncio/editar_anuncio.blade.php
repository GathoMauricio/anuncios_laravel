@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <div class="container p-3" style="background-color:#eaeded">
                    <h2> Editar anuncio</h2>
                    <hr>
                    <form action="{{ route('update_anuncio', $anuncio->id) }}" id="frm_update_anuncio" class="form"
                        method="POST" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Categoría</label>
                                    <select name="categoria_id" id="cbo_categoria_id_create"
                                        onchange="subcategorias(this.value)" class="form-select">
                                        <option value>Selecciona una categoría</option>
                                        @foreach ($categorias as $key => $categoria)
                                            <option value="{{ $categoria->id }}"
                                                @if ($anuncio->categoria_id == $categoria->id) selected @endif>{{ $categoria->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Subcategoria</label>
                                    <select name="subcategoria_id" id="cbo_subcategoria_id_create" class="form-select">
                                        <option value>Selecciona una subcategoría</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Título</label>
                                    <input type="text" name="titulo" value="{{ $anuncio->titulo }}"
                                        id="txt_titulo_create" placeholder="Título de la publicación..."
                                        class="form-control" />
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
                                    <textarea name="deescripcion" id="txt_descripcion_create" placeholder="Descripción de la publicación..."
                                        class="form-control" />{{ $anuncio->descripcion }}</textarea>
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
                                    <input type="number" value="{{ $anuncio->recamaras }}" name="recamaras" min="0"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Baños</label>
                                    <input type="number" value="{{ $anuncio->banos }}" name="banos" min="0"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Estacionamiento</label>
                                    <input type="number" value="{{ $anuncio->estacionamiento }}" name="estacionamiento"
                                        min="0" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Niveles</label>
                                    <input type="number" value="{{ $anuncio->niveles }}" name="niveles" min="0"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Antiguedad (<i>Años</i>)</label>
                                    <input type="number" value="{{ $anuncio->antiguedad }}" name="antiguedad"
                                        min="0" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Precio</label>
                                    <input type="text" name="precio" value="{{ $anuncio->precio }}"
                                        id="txt_precio_create" placeholder="Precio de la publicación..."
                                        class="form-control" />
                                    @error('precio')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" style="width:60px;height: 30px;" name="negociable"
                                        type="checkbox" id="flexSwitchCheckDefault"
                                        @if ($anuncio->negociable) checked @endif>
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
                                    <select name="estado_id" id="cbo_estado_create" class="form-select"
                                        onchange="municipiosCreate(this.value)">
                                        <option value>¿Estado?</option>
                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->idestado }}"
                                                @if ($anuncio->estado_id == $estado->idestado) selected @endif>{{ $estado->estado }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <select name="municipio_id" id="cbo_municipio_create" class="form-select"
                                        onchange="coloniasCreate(this.value)">
                                        <option value>¿Municipio?</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <select name="colonia_id" id="cbo_colonia_create" class="form-select"
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
                                    <input type="text" name="calle_numero" value="{{ $anuncio->calle_numero }}"
                                        placeholder="Calle y número..." id="txt_calle_numero_create"
                                        class="form-control" />
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
                            <div class="form-group p-2">
                                <button type="submit" class="btn btn-danger"
                                    style="background-color: brown;float:right;">Actualizar
                                    anuncio</button>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" style="width:60px;height: 30px;" name="borrador"
                                        type="checkbox" id="flexSwitchCheckDefault"
                                        @if ($anuncio->borrador == 'SI') checked @endif>
                                    <div class="p-2">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">
                                            <strong>
                                                &nbsp;&nbsp;&nbsp;
                                                ¿Guardar como borrador?
                                            </strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
    <script>
        function municipiosCreate(id) {
            console.log("carga: " + id);
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
        $(document).ready(function() {
            subcategorias("{{ $anuncio->categoria_id }}");
            municipiosCreate("{{ $anuncio->estado_id }}");
            setTimeout(function() {
                $("#cbo_subcategoria_id_create").val({{ $anuncio->subcategoria_id }});
                $("#cbo_municipio_create").val({{ $anuncio->municipio_id }});
                coloniasCreate("{{ $anuncio->municipio_id }}");
                setTimeout(function() {
                    $("#cbo_colonia_create").val({{ $anuncio->colonia_id }});
                }, 1000);
                $("#txt_cp_create").val("{{ $anuncio->cp }}");
            }, 1000);
        });
    </script>
@endsection
