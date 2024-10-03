@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <h2>Mi cuenta</h2>
                <form action="{{ route('actualizar_cuenta') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" value="{{ $usuario->name }}" name="name" class="form-control"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>A. Paterno</label>
                                    <input type="text" value="{{ $usuario->apaterno }}" name="apaterno"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>A. Materno</label>
                                    <input type="text" value="{{ $usuario->amaterno }}" name="amaterno"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" value="{{ $usuario->email }}" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input type="phone" value="{{ $usuario->telefono }}" name="telefono"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-3">
                                <input type="submit" value="Actualizar información" class="btn btn-danger"
                                    style="background-color:brown;float:right;" />
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <h4>Actualizar contraseña</h4>
                <form action="{{ route('actualizar_contrasena') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nueva contraseña</label>
                                    <input type="password" name="password" placeholder="6+ caracteres" class="form-control"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Repetir contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-3">
                                <input type="submit" value="Actualizar información" class="btn btn-danger"
                                    style="background-color:brown;float:right;" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3 p-3" style="background-color:#eaeded">
                <img src="{{ asset('img/publica.png') }}" width="100%">
                <br><br>
                <img src="{{ asset('img/como.png') }}" width="100%">
            </div>
        </div>
        <br><br>
        <img src="{{ asset('img/footer.png') }}" width="100%">
    </div>
    @include('anuncio.modal_ver_foto')
@endsection
@section('custom_js')
@endsection
