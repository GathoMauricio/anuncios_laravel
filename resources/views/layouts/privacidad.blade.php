@extends('layouts.app')

@section('content')
    @include('layouts.buscador')
    <div class="container p3">
        <div class="row p-3">
            <div class="col-md-9 p-3" style="background-color:#eaeded">
                <h2>Aviso de Privacidad</h2>
                Aviso de Privacidad

                Con fundamento en los artículos 15 y 16 de la Ley Federal de Protección de Datos Personales en Posesión de
                Particulares hacemos de su conocimiento que categoriainmuebles.com con razón social Distribución Acenter
                S.A. de C.V., con domicilio en Gumersindo Esquer 103 L2 col. ampliación Asturias Cuauhtémoc D.F. 06890
                México es responsable de recabar sus datos personales, del uso que se le dé a los mismos y de su protección.

                Su información personal será utilizada para las siguientes finalidades: proveer los servicios y productos
                que ha solicitado; notificarle sobre nuevos servicios o productos que tengan relación con los ya
                solicitados; comunicarle sobre cambios en los mismos; elaborar estudios y programas que son necesarios para
                determinar hábitos de consumo; realizar evaluaciones periódicas de nuestros productos y servicios a efecto
                de mejorar la calidad de los mismos; evaluar la calidad del servicio que brindamos, y en general, para dar
                cumplimiento a las obligaciones contraídas.



                Para las finalidades antes mencionadas, requerimos obtener los siguientes datos personales:

                • Nombre de Usuario
                • Correo electrónico

                Para Anunciar Propiedades:

                • Características de propiedades inmobiliarias. (dirección, categoría, metraje, valor)

                Es importante informarle que usted tiene derecho al Acceso, Rectificación y Cancelación de sus datos
                personales, a Oponerse al tratamiento de los mismos o a revocar el consentimiento que para dicho fin nos
                haya otorgado.

                Para ello, es necesario que envíe la solicitud en los términos que marca la Ley en su Art. 29 a Lic.
                Carolina Paredes responsable de nuestro Departamento de Protección de Datos Personales, ubicado en
                Gumersindo Esquer 103 L2 col. ampliación Asturias del. Cuauhtémoc D.F. 06890 México, o bien, se comunique al
                teléfono 55-55799356 o vía correo electrónico a gerencia@categoriainmuebles.com, el cual solicitamos
                confirme vía telefónica para garantizar su correcta recepción.
                En caso de que no desee de recibir mensajes promocionales de nuestra parte, puede enviarnos su solicitud por
                medio de la dirección electrónica: gerencia@categoriainmuebles.com Importante: Cualquier modificación a este
                Aviso de Privacidad podrá consultarlo en http://www.categoriainmuebles.com .

                “Cookies” (Galletas)
                http://categoriainmuebles.com se basa en la tecnología "cookie" para que pueda volver a acceder a su perfil
                de cuenta registrada durante una sesión web. Este mecanismo se emplea únicamente para su conveniencia y para
                ningún otro propósito.

                Fecha de última actualización: 08/08/2016 Protección de Datos Personales
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
