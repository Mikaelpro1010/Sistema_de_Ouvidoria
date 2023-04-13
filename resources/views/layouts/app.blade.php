<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo', 'Ouvidoria')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
</head>

<body>
    <div id="app">
        <nav class="mb-3 navbar navbar-expand-lg bg-warning">
            <div class="container">
                <a class="navbar-brand" href="">
                    <div class="d-flex">
                        <figure class="figure">
                            <img src="{{ asset('img/logo.png') }}" class="figure-img img-fluid rounded"
                            alt="40" width="40" height="40">
                        </figure>
                        <span class="fs-3 align-self-center p-1"><b>Ouvidoria</b></span>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto pb-2 pb-lg-0">
                        @auth
                            
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listagem-manifestacao') }}">Manifestação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listagem-secretarias') }}">Secretarias</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Configurações
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('listagem-estado_processo') }}">Estado-Processo</a></li>
                                <li><a class="dropdown-item" href="{{ route('listagem-motivacao') }}">Motivação</a></li>
                                <li><a class="dropdown-item" href="{{ route('listagem-tipo_manifestacao') }}">Tipo de Manifestação</a></li>
                                <li><a class="dropdown-item" href="{{ route('listagem-situacao') }}">Situação</a></li>
                                <li><a class="dropdown-item" href="{{ route('listagem-faq') }}">FAQ</a></li>
                                <li><a class="dropdown-item" href="{{ route('listagem-tipo_usuario') }}">Tipo-Usuario</a></li>
                            </ul>
                        </li>
                        @endauth
                    </ul>
                    <ul class="nav navbar-nav navbar-right gap-2">
                        <!-- Authentication Links -->
                        @guest
                        <li><a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a></li>
                        <li><a class="btn btn-outline-primary" href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
                                aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('pagina-inicial') }}">Inicio</a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class='container'>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    @yield('scripts')

</body>

</html>

{{-- php artisan migrate:fresh --seed --}}
