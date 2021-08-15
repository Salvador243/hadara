<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Gallery', 'HadarA') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="main-pleca">
    <div id="app">
        <!--Navbar-->
        <nav class="navbar navbar-expand navbar-light nav-pleca shadow-sm py-0">
            <div class="container">
                <!--Logo-->
                <a class="navbar-brand" href="{{ route('index') }}">
                </a>
                <!--Navbar items-->
                <ul class="navbar-nav ml-auto mr-auto">
                    <!--search bar-->
                    <form action="{{ route('index') }}" method="GET" id="search-form" class="form-inline mr-2">
                        <div class="input-group">
                            <!--Search input-->
                            <input type="search" name="search" id="search_input" class="form-control search-bar"
                                placeholder="Buscar" aria-describedby="search-button" size="50">
                            <div class="input-group-append">
                                <!-- Example split danger button -->
                                <div class="btn-group">
                                    <button class="search-button" id="search-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                            class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </button>
                                    <button type="button"
                                        class="btn search-toggle dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="form-check dropdown-item">
                                            <input class="form-check-input" type="radio" name="radioSearch"
                                                id="radio_pictures" value="pictures" checked>
                                            <label class="form-check-label" for="radioPictures">
                                                Pictures
                                            </label>
                                        </div>
                                        <div class="form-check dropdown-item">
                                            <input class="form-check-input" type="radio" name="radioSearch"
                                                id="radio_profiles" value="profiles">
                                            <label class="form-check-label" for="radioProfiles">
                                                Profiles
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!---->

                            </div>
                        </div>
                    </form>

                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesi&oacute;n</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registro</a>
                    </li>
                    @endif
                    @else
                    <!--Notifications bell-->
                    <li class="nav-item mr-2">
                        <a href="#" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bell-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                            </svg>
                        </a>
                    </li>
                    <!--Upload picture option-->
                    <li class="nav-item">
                        <a class="navbar-brand" href="{{ route('Upload') }}" role="button">
                            Subir
                        </a>
                    </li>
                </ul>
                <div class="dropdown ml-auto">
                    <a id="userDropdown" class="navbar-brand dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ asset(Auth::user()->avatar) }}" class="avatar" width="30px" width="30px">
                    </a>
                    <!--User dropzone options-->
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!--Profile option-->
                        <a href="{{ route('Pdetails', Auth::user()->email) }}" class="dropdown-item">
                            Profile
                        </a>
                        <!--Logout option-->
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest
            </div>
        </nav>

        <main id="main_container">
            @yield('content')
        </main>
    </div>

</body>
    <footer class="footer-new mb-0 mt-5">
        <div class="container pt-4 mb-2" id="footer-cols">
            <div class="d-flex justify-content-center">
                <div class="footer-col pr-5">
                    <b>SITEMAP</b>
                    <ul class="footer-list">
                        <li><a href="/">Home</a></li>
                        @guest
                        <li><a href="{{ route('login') }}">Iniciar Sesi&oacute;n</a></li>
                        <li><a href="{{ route('register') }}">Registro</a></li>
                        @else
                        <li><a href="{{ route('Pdetails', Auth::user()->email) }}">Perf&iacute;l</a></li>
                        <li><a href="{{ route('Upload') }}">Subir foto</a></li>
                        @endguest
                    </ul>

                </div>

                <div class="footer-col pr-5 pl-5">
                    <div class="d-flex justify-content-between mt-4 mb-4">
                        <a href="#" id="facebook-icon" class="mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.1993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a>

                        <a href="#" id="instagram-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>
                        </a>

                        <a href="#" id="twitter-icon" class="ml-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg>
                        </a>
                    </div>
                    <p class="text-center"><b>Sugerencias</b><br>
                        example@gmail.com
                    </p>
                </div>

                <div class="pl-5">
                    <b>Programadores</b>
                    <ul class="footer-list">
                        <li>Salvador Garc&iacute;a</li>
                        <li>Kevin Arias</li>
                    </ul>
                    <br>
                    <b>Diseñador</b>
                    <ul class="footer-list">
                        <li>Isaias Espinosa</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
        <hr id="footer-hr">
        <p class="text-center text-muted py-2 mb-0" id="footer-bottom">
            <small>&copy;Copyright 2021, HadarA.</small>
        </p>
    </footer>
</body>

</html>
