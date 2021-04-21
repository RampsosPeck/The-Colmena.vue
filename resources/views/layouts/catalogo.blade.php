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

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src="/js/mapInput.js"></script>

    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="/assets/style.css" rel="stylesheet"/>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                    <a class="navbar-brand " href="{{ url('dashboard') }}"><strong>La Colmena </strong></a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                            <li>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <i class="material-icons">account_circle</i>
                                    INGRESAR
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a data-toggle="modal" data-target="#registerModal">
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
                                        <i class="material-icons">dns</i> Categorias
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/developer"  class="nav-link">
                                        <i class="material-icons">dns</i> Developer
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <router-link to="/productos"  class="nav-link">
                                <i class="material-icons">shop</i> Productos
                            </router-link>
                        </li>
                        <li>
                            <a href="../index.html">
                                <i class="material-icons">format_list_numbered</i> Pedidos
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i> {{ Auth::user()->fullname }}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-with-icons">
                                <li>
                                    <a href="../index.html">
                                        <i class="material-icons">contacts</i> Perfil
                                    </a>
                                </li>
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
                                 Carrito</b>
                                 <span class="label label-warning">{{ $productsCount }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/secondary/potosi.jpg');">

        </div>

        <div class="main main-raised">
            <div class="profile-content">
                <div class="container">

                    <div class="row">
                        <div class="col-xs-6 col-xs-offset-3">
                           <div class="profile">
                                <div class="avatar">
                                    <img src="/img/secondary/menu.svg" alt="Circle Image" class="img-responsive">
                                </div>
                                <div class="name">
                                    <h3 class="title">CATÁLOGO - MENÚ</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="profile-tabs" style="margin-top: 2px;">
                                <div class="nav-align-center">
                                    <ul class="nav nav-pills nav-pills-rose nav-pills-icons" role="tablist">
                                        <li class="active">
                                            <a href="#tortas" role="tab" data-toggle="tab">
                                                <img src="/img/secondary/torta.svg"  class="material-icons img-responsive">
                                                TORTAS
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#comidas" role="tab" data-toggle="tab">
                                                <img src="/img/secondary/comida2.svg"  class="material-icons img-responsive">
                                                COMIDAS
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#varios" role="tab" data-toggle="tab">
                                                <img src="/img/secondary/store.svg"  class="material-icons img-responsive">
                                                TIENDA
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tortas">
                            <div class="row">
                                @foreach($protortas as $pro)
                                <div class="col-md-3">
                                    <div class="card card-blog  shadow" style="background-color: #f2f2f2;">
                                        <div class="card-image">
                                            @if($pro->descuento)
                                            <div class="ribbon ribbon-top-right ">
                                                <span><strong> {{ $pro->descuento }} % DTO. </strong></span>
                                            </div>
                                            @endif
                                            <a href="#pablo">
                                                <label class="cardprecio label label-primary" > Bs. <strong>{{ $pro->precio }}</strong> </label>
                                                <img class="imgcard" src="{{ asset($pro->imgproductourl) }}" />
                                            </a>
                                        </div>

                                        <div class="card-content">
                                            <h4 class="card-title text-center">
                                                <a href="#pablo">{{ $pro->nombre }}</a>
                                            </h4>
                                            <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                {{ $pro->descripcion }}
                                            </p>
                                            <form method="POST" action="{{ url('producto_detalles') }}">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $pro->id }}">
                                            <div class="footer">
                                                <div class="author">
                                                     <div class="btn-group " >
                                                        <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="material-icons">remove</i> </button>
                                                        <div class="btncant" style="line-height: 1.8;">
                                                        <input class="letracard" min="1" name="cantidad" value="1" type="number"  >
                                                        </div>
                                                        <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> <i class="material-icons">add</i> </button>
                                                    </div>
                                                </div>
                                                <div class="stats">
                                                    <div class="btn-group">
                                                        <button class="btn btn-round btn-rose btn-xs" type="submit">
                                                            <strong> Añadir </strong>
                                                            <i class="material-icons" >add_shopping_cart</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane" id="comidas" >
                                <div class="col-md-3 ">
                                    <div class="card card-pricing card-background" style="background-image: url({{$almuerzo->imgproductourl}})">
                                        <div class="card-content">
                                            <h4 class="title text-info">ALMUERZO FAMILIAR</h4>
                                            <h3 class="card-title"><small>Bs.</small>{{ $almuerzo->precio }}</h3>
                                            <ul>
                                                <li><b>Entrada:</b> {{ $almuerzo->prodetalle->entrada }}</li>
                                                <li><b>Sopa:</b> {{ $almuerzo->prodetalle->sopa }}</li>
                                                <li><b>Segundo:</b> {{ $almuerzo->prodetalle->segundo }}</li>
                                                <li><b>Refresco:</b> {{ $almuerzo->prodetalle->refresco }}</li>
                                                <li><b>Postre:</b> {{ $almuerzo->prodetalle->postre }}</li>
                                            </ul>
                                            <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                {{ $almuerzo->descripcion }}
                                            </p>
                                            <form method="POST" action="{{ url('producto_detalles') }}">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $almuerzo->id }}">
                                            <div class="footer text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-round btn-rose btn-xs" style="border-radius: 33px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="material-icons">remove</i> </button>
                                                    <div class="btncant" style="line-height: 1.8;">
                                                    <input class="letracard" min="1" name="cantidad" value="1" type="number" style="background-color: #9c27b0; color:white;" >
                                                    </div>
                                                    <button type="button" class="btn btn-round btn-rose btn-xs" style="border-radius: 33px;" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> <i class="material-icons">add</i> </button>
                                                </div>

                                                <button class="btn btn-round btn-rose btn-xs" type="submit">
                                                    <strong> Añadir</strong>
                                                    <i class="material-icons" >add_shopping_cart</i>
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <h4 class="title">Platos extras</h4>
                                    <div class="row collections">
                                        @foreach($procomidas as $comida)
                                            @if(!$comida->prodetalle)
                                            <div class="col-md-4">
                                                <div class="card card-blog shadow" style="background-color: #f2f2f2;">

                                                    <div class="card-image">
                                                        @if($comida->descuento)
                                                        <div class="ribbon ribbon-top-right ">
                                                            <span><strong> {{ $comida->descuento }}% DTO. </strong></span>
                                                        </div>
                                                        @endif
                                                        <a href="#pablo">
                                                        <label class="cardprecio label label-primary" > Bs. <strong>{{ $comida->precio }}</strong> </label>
                                                        <img class="imgcard" src="{{ asset($comida->imgproductourl) }}" />
                                                        </a>
                                                    </div>

                                                    <div class="card-content">
                                                        <h4 class="card-title text-center">
                                                            <a href="#pablo">{{ $comida->nombre }}</a>
                                                        </h4>
                                                        <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                            {{ $comida->descripcion }}.
                                                        </p>
                                                        <form method="POST" action="{{ url('producto_detalles') }}">
                                                        @csrf
                                                        <input type="hidden" name="producto_id" value="{{ $comida->id }}">
                                                        <div class="footer">
                                                            <div class="author">
                                                                 <div class="btn-group">
                                                                    <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                                        <i class="material-icons">remove</i> </button>
                                                                    <div class="btncant" style="line-height: 1.8;">
                                                                    <input class="letracard" min="1" name="cantidad" value="1" type="number"  >
                                                                    </div>
                                                                    <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> <i class="material-icons">add</i> </button>
                                                                </div>
                                                            </div>
                                                            <div class="stats">
                                                                <div class="btn-group">
                                                                    <button class="btn btn-round btn-rose btn-xs" type="submit">
                                                                        <strong> Añadir </strong>
                                                                        <i class="material-icons" >add_shopping_cart</i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                        </div>

                        <div class="tab-pane" id="varios" >
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    @foreach($provarios as $vario)
                                    <div class="col-md-6">
                                        <div class="card card-blog shadow" style="background-color: #f2f2f2;">

                                            <div class="card-image">
                                                @if($vario->descuento)
                                                <div class="ribbon ribbon-top-right ">
                                                    <span><strong> {{ $vario->descuento }}% DTO. </strong></span>
                                                </div>
                                                @endif
                                                <a href="#pablo">
                                                <label class="cardprecio label label-primary" > Bs. <strong>{{ $vario->precio }}</strong> </label>
                                                <img class="imgcard" src="{{ asset($vario->imgproductourl) }}" />
                                                </a>
                                            </div>

                                            <div class="card-content">
                                                <h4 class="card-title text-center">
                                                    <a href="#pablo">{{ $vario->nombre }}</a>
                                                </h4>
                                                <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                    {{ $vario->descripcion }}
                                                </p>
                                                <form method="POST" action="{{ url('producto_detalles') }}">
                                                @csrf
                                                <input type="hidden" name="producto_id" value="{{ $vario->id }}">
                                                <div class="footer" >
                                                    <div class="author">
                                                         <div class="btn-group">
                                                            <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="material-icons">remove</i> </button>
                                                            <div class="btncant" style="line-height: 1.8;">
                                                            <input class="letracard" min="1" name="cantidad" value="1" type="number"  >
                                                            </div>
                                                            <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> <i class="material-icons">add</i> </button>
                                                        </div>
                                                    </div>
                                                    <div class="stats">
                                                        <div class="btn-group">
                                                            <button class="btn btn-round btn-rose btn-xs">
                                                                <strong> Añadir </strong>
                                                                <i class="material-icons" >add_shopping_cart</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                     {{ date('Y') }} &copy; Created By <i class="fa fa-android" aria-hidden="true"></i> Mentrax
                </div>
            </div>
        </footer>

    </div>



<!-- Login Modal -->
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
<!--  End Modal -->

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h2 class="modal-title card-title text-center" id="myModalLabel">REGISTRATE GRATIS</h2>
                <p class="description text-center">Los campos de este <span class="text-rose"><b>color</b></span> son obligatorios </p>
                <p class="description text-center">Mueva el icono <i class="material-icons text-rose">room</i>  en donde esta su casa exactamente. </p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="media media-post">
                        <div class="row">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" data-toggle="validator" role="form">
                                @csrf
                                <div class="col-md-3 text-center">
                                    <h4><b>Foto de perfil</b></h4>
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                            <img src="assets/img/placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised @error('foto') has-error is-focused @enderror"></div>
                                        <div>
                                            <span class="btn btn-raised btn-round btn-rose btn-file">
                                                <span class="fileinput-new">Añadir Imagen</span>
                                                <span class="fileinput-exists">Cambiar</span>
                                                <input type="file" name="foto"  >
                                            </span>
                                            <br>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
                                        </div>
                                        @error('foto')
                                            <span class="has-error text-danger" >
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="media-footer">
                                        <h6>Registrarse con:</h6>
                                        <a href="" class="btn btn-just-icon btn-round btn-twitter">
                                              <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="" class="btn btn-just-icon btn-round btn-facebook">
                                              <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="" class="btn btn-just-icon btn-round btn-google">
                                              <i class="fa fa-google-plus-square"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8 text-center">

                                    <div class="col-md-6">
                                        <div class="input-group @error('fullname') has-error is-focused @enderror">
                                            <span class="input-group-addon">
                                                <i class="material-icons text-rose">face</i>
                                            </span>
                                            <input type="text" class="form-control"name="fullname" autofocus required value="{{ old('fullname') }}" placeholder="Nombre completo">
                                            @error('fullname')
                                                <span class="has-error text-danger" >
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="input-group @error('celular') has-error is-focused @enderror">
                                            <span class="input-group-addon">
                                                <i class="material-icons text-rose">stay_current_portrait</i>
                                            </span>
                                                <input type="number" class="form-control" name="celular" required value="{{ old('celular') }}" placeholder="Número de celular">
                                            @error('celular')
                                                <span class="has-error text-danger" >
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons text-rose">room</i>
                                            </span>
                                            <div class="form-group label-floating is-empty @error('direccion') has-error is-focused @enderror">
                                                <label class="control-label">Detalle su dirección especifica:</label>
                                                <textarea class="form-control bg-light border-0 @error('direccion') is-invalid @enderror" name="direccion" id="direccion" rows="4" >{{ old('direccion') }}</textarea>
                                                <span class="material-input"></span>
                                            </div>
                                            @error('direccion')
                                                <span class="has-error text-danger" >
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="mibusqueda" name="location" class="form-control map-input"  placeholder="Registre o busque su dirección." >
                                            <input type="hidden" name="lat" id="lat"/>
                                            <input type="hidden" name="lng" id="lng" />
                                        </div>
                                        <div id="address-map-container" style="width:100%;height:300px; ">
                                            <div style="width: 100%; height: 100%" id="map-canvas"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-footer text-center">
                                    <button class="btn btn-default btn-round" type="botton" data-dismiss="modal">
                                        <i class="material-icons">close</i>
                                        CANCELAR
                                    </button>
                                    <button class="btn btn-rose btn-round" type="submit">
                                        <i class="material-icons">person_pin</i>
                                        ENVIAR
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->
 @include('sweet::alert')
</body>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('assets/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/nouislider.min.js') }}" ></script>
    <script src="{{ asset('assets/bootstrap-datetimepicker.js') }}" ></script>
</html>
