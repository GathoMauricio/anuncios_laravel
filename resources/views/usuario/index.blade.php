@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
                <h2>Usuarios</h2>
                {{ $usuarios->links('pagination::bootstrap-5') }}
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
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Sin registros</td>
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
