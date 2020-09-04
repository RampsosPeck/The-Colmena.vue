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

    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyALsfWww_p2mj2KjasPSKbPzCR3pXsbvdc"></script>

    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="/assets/style.css" rel="stylesheet"/>

</head>

<body class="profile-page">
    <div id="app">
        <nav class="navbar navbar-rose navbar-transparent navbar-fixed-top navbar-color-on-scroll">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand " href="/" style="padding-top: 1px !important; margin-top: -15px;">
                        <img class="nav-icon" src="{{ asset('/img/secondary/logo1.png') }}" alt="La Colmena" width="220" height="80"/>
                    </a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         @guest
                            <li>
                                <router-link to="/dashboard"  class="nav-link">
                                    <i class="material-icons">local_offer</i>Catálogo
                                </router-link>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <i class="material-icons">account_circle</i>
                                    INGRESAR
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">
                                        <i class="material-icons">create</i>
                                        {{ __('REGISTRARSE') }}
                                    </a>
                                </li>
                            @endif
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">view_carousel</i> Administracion
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-with-icons">
                                <li>
                                    <router-link to="/users"  class="nav-link">
                                        <i class="material-icons">group_add</i> Usuarios
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/categorias"  class="nav-link">
                                        <i class="material-icons">input</i> Categorias
                                    </router-link>
                                </li>
                                @can('isSadmin')
                                <li>
                                    <router-link to="/developer"  class="nav-link">
                                        <i class="material-icons">dns</i> Developer
                                    </router-link>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li>
                            <router-link to="/dashboard"  class="nav-link">
                                <i class="material-icons">local_offer</i>Catálogo
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/productos"  class="nav-link">
                                <i class="material-icons">shop</i> Productos
                            </router-link>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">markunread_mailbox</i> Pedidos
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-with-icons">
                                <li>
                                    <router-link to="/pedidos"  class="nav-link">
                                        <i class="material-icons text-info">markunread_mailbox</i> Recibidos
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/aceptados"  class="nav-link">
                                        <i class="material-icons text-success">offline_pin</i> Aceptados
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/rechazados"  class="nav-link">
                                        <i class="material-icons text-danger">assignment_late</i> Rechazados
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/enviados"  class="nav-link">
                                        <i class="material-icons text-warning">motorcycle</i> Enviados
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/vendidos"  class="nav-link">
                                        <i class="material-icons text-rose">done_all</i> Entregados
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i> {{ auth()->user()->fullname }}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-with-icons">
                                <li>
                                    <router-link to="/profile"  class="nav-link">
                                        <i class="material-icons">contacts</i> Perfil
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons">exit_to_app</i>
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                        <count-producto :count="{{ $productsCount }}"></count-producto>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/secondary/potosi.jpg');">
            <div style="position: relative; ">
                <img class="imgcol" src="{{ asset('/img/secondary/logocentral.png') }}" alt="Colmena Image" />
            </div>
        </div>

        <router-view></router-view>

        <vue-progress-bar></vue-progress-bar>

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

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="card card-signup card-plain">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>

                            <div class="header header-rose text-center">
                                <h4 class="card-title">INICIO DE SECIÓN </h4>
                                <div class="social-line">
                                    <a href="#pablo" class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="card-content">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons text-rose">stay_current_portrait</i>
                                        </span>
                                        <div class="form-group label-floating is-empty @error('celular') has-error is-focused @enderror">
                                            <label class="control-label">Celular:</label>
                                            <input type="number" class="form-control" name="celular" required value="{{ old('celular') }}">
                                            <span class="material-input"></span>
                                        </div>
                                        @error('celular')
                                            <span class="has-error text-danger" >
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons text-rose">lock_outline</i>
                                        </span>
                                        <div class="form-group label-floating is-empty @error('password') has-error is-focused @enderror">
                                            <label class="control-label">Contraseña:</label>
                                            <input type="password" class="form-control" name="password" required>
                                            <span class="material-input"></span>
                                        </div>
                                        @error('password')
                                            <span class="has-error text-danger" >
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-rose btn-round">
                                        {{ __('INGRESAR') }}
                                    </button>
                                </div>
                            </form>
                            <div class="text-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-danger btn-round btn-sm " href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('assets/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/nouislider.min.js') }}" ></script>
    <script src="{{ asset('assets/bootstrap-datetimepicker.js') }}" ></script>

    <script>
        $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
    </script>

</html>
