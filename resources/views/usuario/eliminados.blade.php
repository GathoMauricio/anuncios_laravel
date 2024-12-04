@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
                <h2>Usuarios eliminados</h2>
                {{ $usuarios->links('pagination::bootstrap-5') }}
                <a href="{{ route('usuarios') }}" style="float:right;">Usuarios activos</a>
                <br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Anuncios</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                            <tr>
                                <td>
                                    @if ($usuario->rol_id == 1)
                                        Cliente
                                    @else
                                        Administrador
                                    @endif
                                </td>
                                <td>{{ $usuario->name }} {{ $usuario->apaterno }} {{ $usuario->amaterno }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>{{ $usuario->anuncios->count() }}</td>
                                <td>
                                    <table>
                                        <tr>
                                            {{--  <td>
                                                <a href="{{ route('show_usuarios', $usuario->id) }}" title="Ver"
                                                    class="btn btn-primary"><span class="icon icon-eye"
                                                        style="color:white;"></span></a>
                                            </td>  --}}
                                            {{--  <td>
                                    <a href="$#" title="Editar" class="btn btn-warning"><span class="icon icon-pencil"
                                            style="color:white;"></span></a>
                                </td>  --}}
                                            {{--  <td>
                                        <a href="javascript:void(0)"
                                            onclick="eliminarUsuario({{ $usuario->id }});"
                                            title="Eliminar" class="btn btn-danger"><span
                                                class="icon icon-bin"></span></a>
                                        <form action="{{ route('delete_usuario', $usuario->id) }}"
                                            id="form_eliminar_usuario_{{ $usuario->id }}"
                                            method="POST" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>  --}}
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Sin registros</td>
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
