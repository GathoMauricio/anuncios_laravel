@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <h2> Detalle del anuncio</h2>
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
                <div class="container">
                    <div class="row">
                        @foreach ($anuncio->fotos as $key => $foto)
                            <div class="col-md-4">
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
                {{ $anuncio->municipio->municipio }},
                {{ $anuncio->colonia->colonia }}.
                {{ $anuncio->calle_numero }},
                CP {{ $anuncio->cp }}
                <br>
                @if ($anuncio->estatus_id == 2)
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
                    <strong>Email: </strong><a
                        href="mailto:{{ $anuncio->cliente->email }}">{{ $anuncio->cliente->email }}</a>
                @endif
                <br>
                <center>
                    <a href="#" class="btn btn-danger" style="background-color: brown;">Contactar al autor</a>
                </center>
            </div>
            <div class="col-md-3 p-3" style="background-color:#eaeded">
                @if (Auth::check() && $anuncio->user_id == Auth()->user()->id && $anuncio->estatus_id == 1)
                    <div class="card">
                        <div class="card-header" style="background-color:brown;color:white;">
                            <h5>Premium</h5>
                        </div>
                        <div class="card-body">
                            Hola <strong>{{ $anuncio->cliente->name }}</strong> por el momento tu anuncio no es
                            <b><i>Premium</i></b>
                            por lo tanto tus datos de contacto no son visibles para los posibles interesados.
                            <br><br>
                            Te recomendamos hacerlo premium para que tus contactos puedan comunicarse contigo facilmente.
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('hacer_premium', $anuncio->id) }}" class="btn btn-danger"
                                style="background-color: brown;width:100%">Hacer
                                premium</a>
                        </div>
                    </div>
                    <br><br>
                @endif
                <img src="{{ asset('img/publica.png') }}" width="100%">
                <br><br>
                <img src="{{ asset('img/como.png') }}" width="100%">
            </div>
        </div>
        <br><br>
        <img src="{{ asset('img/footer.png') }}" width="100%">
    </div>
@endsection
