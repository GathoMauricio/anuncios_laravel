<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="{{ asset('img/favicon.ico') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('font.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- SELECT 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Scripts -->
    <link href="{{ asset('alertify/css/alertify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('alertify/css/themes/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LdRUGoqAAAAAFNxt75SbQ-Lqpd0TOgDbhklJQ-K"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" width="240">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-danger" href="{{ route('login') }}"><strong>Iniciar
                                            sesión</strong></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-danger" style="background-color: brown;"
                                        href="{{ route('register') }}"><strong>Registrarme</strong></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle  text-danger" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item  text-danger" href="{{ route('cuenta') }}">
                                        Cuenta
                                    </a>
                                    <a class="dropdown-item  text-danger" href="{{ route('mis_anuncios') }}">
                                        Mis anuncios
                                    </a>
                                    @if (Auth::user()->rol_id == 2)
                                        <a class="dropdown-item  text-danger" href="{{ route('usuarios') }}">
                                            Usuarios
                                        </a>
                                        <a class="dropdown-item  text-danger" href="{{ route('anuncios') }}">
                                            Todos los anuncios
                                        </a>
                                        {{--  <a class="dropdown-item  text-danger" href="#">
                                            Categorías
                                        </a>  --}}
                                    @endif
                                    <a class="dropdown-item  text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-danger" style="background-color: brown;"
                                    href="{{ route('crear_anuncio') }}"><strong>Crear
                                        anuncio</strong></a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br>
        @if (Session::has('message'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <!-- SELECT 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- ALERTIFY -->
    <script src="{{ asset('alertify/alertify.min.js') }}"></script>
    <!-- FABRIC JS -->
    <script src="https://unpkg.com/fabric@5.3.0/dist/fabric.min.js"></script>
    <!-- MASK JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
            $('.only_numbers').mask('000000');
        });
    </script>
    @yield('custom_js')
</body>

</html>
