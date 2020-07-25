<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>La Colmena - Catálogo</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <meta name="description" content="Sistema de pedidos en linea realizado para la tienda LA COLMENA">
    <meta name="author" content="Ing. Jorge Peralta">
    <meta name="keyword" content="Sistema de pedidos en linea, Sistema bajo plataforma web La colmena. ">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/img/welcome/colmena.svg') }}" />

    <!-- CSS Files
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/> -->


    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="/assets/style.css" rel="stylesheet"/>

</head>

<body class="login-page">
    <div id="app">
        <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><b>LA COLMENA</b></a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="material-icons">account_circle</i>
                                    INGRESAR
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="material-icons">create</i>
                                        {{ __('REGISTRARSE') }}
                                    </a>
                                </li>
                            @endif
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i> {{ Auth::user()->name }}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-with-icons">
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons">exit_to_app</i> {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                        <li>
                            <a href="" target="_blank" class="btn btn-rose btn-round btn-sm" data-toggle="tooltip" data-placement="bottom" title="Carrito/Compras">
                                <img src="{{ asset('/img/secondary/cart.svg') }}" alt="pedidos" width="30" class="nav-icon" ><b>
                                 Compras</b>
                                 <span class="label label-warning"> 1</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="page-header header-filter" style="background-image: url('../img/welcome/potosi2.jpg'); background-size: cover; background-position: top center;">


            @yield('authcontent')

            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="/">
                                    SERVICIOS
                                </a>
                            </li>
                            <li>
                                <a href="/#about">
                                   NOSOTROS
                                </a>
                            </li>
                            <li>
                                <a href="/#guia">
                                   GUIA
                                </a>
                            </li>
                            <li>
                                <a href="/#ventajas">
                                    VENTAJAS
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                         {{ date('Y') }} &copy; Create By <i class="fa fa-android" aria-hidden="true"></i> Mentrax
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
    <script src="{{ asset('js/app.js') }}" ></script>
</html>

