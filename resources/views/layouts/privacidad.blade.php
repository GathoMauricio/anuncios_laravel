@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <a href="javascript:void(0)" onclick="history.back();"><span class="icon-undo"></span> Regresar</a>
                <h2>Aviso de Privacidad</h2>
                Con fundamento en los artículos 15 y 16 de la <strong>Ley Federal de Protección de Datos Personales en
                    Posesión de
                    Particulares</strong> hacemos de su conocimiento que catinmo.com con razón social
                <strong>Comercializadora Arm21 S.A. de
                    C.V.</strong>, con domicilio en <strong>Eleuterio Méndez 1540 col. San Simón Ticumac, CDMX, 03660,
                    Benito Juárez, México</strong> es
                responsable de recabar sus datos personales, del uso que se le dé a los mismos y de su protección.
                Su información personal será utilizada para las siguientes finalidades: proveer los servicios y productos
                que ha solicitado; notificarle sobre nuevos servicios o productos que tengan relación con los ya
                solicitados; comunicarle sobre cambios en los mismos; elaborar estudios y programas que son necesarios para
                determinar hábitos de consumo; realizar evaluaciones periódicas de nuestros productos y servicios a efecto
                de mejorar la calidad de los mismos; evaluar la calidad del servicio que brindamos, y en general, para dar
                cumplimiento a las obligaciones contraídas.
                Para las finalidades antes mencionadas, requerimos obtener los siguientes datos personales:
                <ul>
                    <li><strong>Nombre de Usuario</strong></li>
                    <li><strong>Correo electrónico</strong></li>
                    <li><strong>Teléfono de contacto del anuncio/s</strong></li>
                </ul>
                <strong>Para Anunciar Propiedades:</strong>
                <br><br>
                <strong>• Características de propiedades inmobiliarias. (dirección, categoría, metraje, valor)</strong>
                <br><br>
                Es importante informarle que usted tiene derecho al Acceso, Rectificación y Cancelación de sus datos
                personales, a Oponerse al tratamiento de los mismos o a revocar el consentimiento que para dicho fin nos
                haya otorgado.
                Para ello, es necesario que envíe la solicitud en los términos que marca la Ley en su Art. 29 a Lic.
                Carolina Paredes responsable de nuestro Departamento de Protección de Datos Personales, ubicado en Eleuterio
                Méndez 1540 col. San Simón Ticumac, CDMX, 03660, Benito Juárez, México, o bien, se comunique al teléfono
                55-55799356 o vía correo electrónico a <a
                    href="mailto:gerencia@categoriainmuebles.com">gerencia@categoriainmuebles.com</a> o <a
                    href="mailto:contacto@catinmo.com">contacto@catinmo.com</a>, el cual
                solicitamos confirme vía telefónica para garantizar su correcta recepción.
                En caso de que no desee de recibir mensajes promocionales de nuestra parte, puede enviarnos su solicitud por
                medio de la dirección electrónica: <a
                    href="mailto:gerencia@categoriainmuebles.com">gerencia@categoriainmuebles.com</a> o <a
                    href="mailto:contacto@catinmo.com">contacto@catinmo.com</a> Importante:
                Cualquier modificación a este Aviso de Privacidad podrá consultarlo en <a
                    href="https://www.catinmo.com">https://www.catinmo.com</a> .
                <br><br>
                <strong>“Cookies” (Galletas)</strong>
                <br><br>
                <a href="https://www.catinmo.com">https://www.catinmo.com</a> se basa en la tecnología "cookie" para que
                pueda volver a acceder a su perfil de cuenta
                registrada durante una sesión web. Este mecanismo se emplea únicamente para su conveniencia y para ningún
                otro propósito.
                <br>
                Fecha de última actualización: 06/11/2024 Protección de Datos Personales
                <br>
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
