@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
                <h2>Detalle de usuario</h2>
                <br>
                <strong>Rol: </strong>{{ $usuario->rol->rol }}
                <br>
                <strong>Nombre: </strong>{{ $usuario->name }} {{ $usuario->apaterno }} {{ $usuario->amaterno }}
                <br>
                <strong>Email: </strong>{{ $usuario->email }} <strong>Teléfono: </strong> {{ $usuario->telefono }}
                <br><br>
                <div style="width: 100%;overflow:hidden;overflow-x:scroll;">
                    <h2>Anuncios</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Estatus</th>
                                <th>Usuario</th>
                                <th>Título</th>
                                {{--  <th>Descripcion</th>  --}}
                                <th>Precio</th>
                                <th>Borrador</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usuario->anuncios as $anuncio)
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
                                    <td>{{ $anuncio->estatus->nombre }}</td>
                                    <td>{{ $anuncio->cliente->email }}</td>
                                    <td>{{ $anuncio->titulo }}</td>
                                    {{--  <td>{{ $anuncio->descripcion }}</td>  --}}
                                    <td>${{ $anuncio->precio }}</td>
                                    <td>{{ $anuncio->borrador }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <a href="{{ route('ver_anuncio', [$anuncio->id, \Str::slug($anuncio->titulo)]) }}"
                                                                    title="Ver" class="btn btn-primary"><span
                                                                        class="icon icon-eye"></span></a>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    onclick="cambiarEstatus({{ $anuncio->id }},{{ $anuncio->estatus_id }});"
                                                                    title="Editar" class="btn btn-warning"><span
                                                                        class="icon icon-pencil"
                                                                        style="color:white;"></span></a>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    onclick="eliminarAnuncio({{ $anuncio->id }});"
                                                                    title="Eliminar" class="btn btn-danger"><span
                                                                        class="icon icon-bin"></span></a>
                                                                <form action="{{ route('delete_anuncio', $anuncio->id) }}"
                                                                    id="form_eliminar_anuncio_{{ $anuncio->id }}"
                                                                    method="POST" style="display:none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No se encontraron resultados</td>
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
    @include('anuncio.modal_cambio_estatus')
@endsection
@section('custom_js')
    <script>
        function cambiarEstatus(anuncio_id, estatus_id) {
            $("#txt_anuncio_id").val(anuncio_id);
            $("#cbo_estatus_id").val(estatus_id);
            $("#modal_cambio_estatus").modal('show');
        }

        function eliminarAnuncio(anuncio_id) {
            alertify.confirm('¿Realmente deseas eliminar este anuncio?', function() {
                $("#form_eliminar_anuncio_" + anuncio_id).submit();
            }).set({
                title: 'Espera'
            }).set('labels', {
                ok: 'Eliminar',
                cancel: 'Cancelar'
            });
        }
    </script>
@endsection
