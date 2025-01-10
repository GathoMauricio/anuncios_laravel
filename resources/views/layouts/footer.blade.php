<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h6><strong>ACERCA DE NOSOTROS</strong></h6>
            <a href="{{ route('condiciones') }}" style="color:gray;text-decoration:none;">Condiciones</a>
            <br>
            <a href="{{ route('privacidad') }}" style="color:gray;text-decoration:none;">Aviso de privacidad</a>
        </div>
        <div class="col-md-3">
            <h6><strong>MI CUENTA</strong></h6>
            <a href="{{ route('cuenta') }}" style="color:gray;text-decoration:none;">Mi cuenta</a>
            <br>
            <a href="{{ route('mis_anuncios') }}" style="color:gray;text-decoration:none;">Mis anuncios</a>
        </div>
        @if (request()->session()->get('cliente', 'default_value') != 'flutter')
            <div class="col-md-3">
                <h6><strong>SÍGUENOS EN</strong></h6>
                <a href="https://www.facebook.com/search/top?q=katzesystems.inc" target="_blank" class="btn btn-primary"
                    title="Faceboox">
                    <span class="icon icon-facebook"></span>
                </a>
                {{--  &nbsp;&nbsp;&nbsp;
                <div class="fb-like" data-href="https://www.facebook.com/profile.php?id=100066751009079&locale=es_LA"
                    data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false">
                </div>  --}}
            </div>
        @endif
        <div class="col-md-3">
            <h6><strong>CONTACTO</strong></h6>
            <small>
                Dirección: Eleuterio Méndez 1540<br>
                Col. San Simón Ticumac<br>
                Benito Juárez, 03660<br>
                CDMX, México.<br>
                Teléfono: 55 55799356<br>
                WhatsApp: 55 39799471<br>
            </small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            | Copyright © {{ date('2025') }} |
            <a href="https://www.facebook.com/search/top?q=katzesystems.inc"><img
                    src="{{ asset('img/logo_katze.png') }}" width="20" height="20"> KatzeSystems.Inc</a>
            | Todos los derechos reservados. |
        </div>
    </div>
</div>
