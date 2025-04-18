@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
                <h2>¿Quiénes Somos?</h2>
                <h4>
                    Catinmo portal mexicano de anuncios de inmuebles, casas en venta y renta, departamentos en venta y
                    renta, locales comerciales, oficinas, terrenos en venta y renta, nuestro objetivo es apoyar al público
                    en general brindando una página publicitaria eficiente, sencilla y moderna. Nuestra visión es ser el
                    mejor portal de anuncios en México, a precios asequibles.
                </h4>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
@endsection
