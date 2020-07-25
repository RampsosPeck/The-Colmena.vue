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
                                 Compras</b>
                                 <span class="label label-warning"> 1</span>
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
                                                VARIOS
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane connections" id="tortas">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card card-blog  shadow" style="background-color: #f2f2f2;">
                                        <div class="card-image">
                                            <div class="ribbon ribbon-top-right ">
                                                <span><strong> 30% DTO. </strong></span>
                                            </div>
                                            <a href="#pablo">
                                                <label class="cardprecio label label-primary" > Bs. <strong>20.00</strong> </label>
                                                <img class="imgcard" src="/img/secondary/a461x407.png" />
                                            </a>
                                        </div>

                                        <div class="card-content">
                                            <h4 class="card-title text-center">
                                                <a href="#pablo">5 Common Startup</a>
                                            </h4>
                                            <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                Don't be scared of the truth because we need to restart   Owens’ bed design but the back is...PRUEBA
                                            </p>
                                            <div class="footer">
                                                <div class="author">
                                                     <div class="btn-group">
                                                        <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;">
                                                            <i class="material-icons">remove</i> </button>
                                                        <button class="btn btn-round btn-danger btn-xs" style="padding: 4px 8px !important;" ><span style="line-height: 1.7;"><strong> 3 </strong></span></button>
                                                        <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;"> <i class="material-icons">add</i> </button>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-blog shadow" style="background-color: #f2f2f2;">

                                        <div class="card-image">
                                            <div class="ribbon ribbon-top-right ">
                                                <span><strong> 30% DTO. </strong></span>
                                            </div>
                                            <a href="#pablo">
                                            <label class="cardprecio label label-primary" > Bs. <strong>50.00</strong> </label>
                                            <img class="imgcard" src="/img/secondary/a671X671.png" />
                                            </a>
                                        </div>

                                        <div class="card-content">
                                            <h4 class="card-title text-center">
                                                <a href="#pablo">5 Common dos Startup</a>
                                            </h4>
                                            <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                Don't be scared of the truth because we need to restart   Owens’ bed design but the back issss...
                                            </p>
                                            <div class="footer">
                                                <div class="author">
                                                     <div class="btn-group">
                                                        <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;">
                                                            <i class="material-icons">remove</i> </button>
                                                        <button class="btn btn-round btn-danger btn-xs" style="padding: 4px 8px !important;" ><span style="line-height: 1.7;"><strong> 3 </strong></span></button>
                                                        <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;"> <i class="material-icons">add</i> </button>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-blog  shadow" style="background-color: #f2f2f2;">
                                        <div class="card-image">
                                            <div class="ribbon ribbon-top-right ">
                                                <span><strong> 30% DTO. </strong></span>
                                            </div>
                                            <a href="#pablo">
                                                <label class="cardprecio label label-primary" > Bs. <strong>20.00</strong> </label>
                                                <img class="imgcard" src="/img/secondary/a461x407.png" />
                                            </a>
                                        </div>

                                        <div class="card-content">
                                            <h4 class="card-title text-center">
                                                <a href="#pablo">5 Common Startup</a>
                                            </h4>
                                            <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                Don't be scared of the truth because we need to restart   Owens’ bed design but the back is...PRUEBA
                                            </p>
                                            <div class="footer">
                                                <div class="author">
                                                     <div class="btn-group">
                                                        <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;">
                                                            <i class="material-icons">remove</i> </button>
                                                        <button class="btn btn-round btn-danger btn-xs" style="padding: 4px 8px !important;" ><span style="line-height: 1.7;"><strong> 3 </strong></span></button>
                                                        <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;"> <i class="material-icons">add</i> </button>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-blog shadow" style="background-color: #f2f2f2;">

                                        <div class="card-image">
                                            <div class="ribbon ribbon-top-right ">
                                                <span><strong> 30% DTO. </strong></span>
                                            </div>
                                            <a href="#pablo">
                                            <label class="cardprecio label label-primary" > Bs. <strong>50.00</strong> </label>
                                            <img class="imgcard" src="/img/secondary/a671X671.png" />
                                            </a>
                                        </div>

                                        <div class="card-content">
                                            <h4 class="card-title text-center">
                                                <a href="#pablo">5 Common dos Startup</a>
                                            </h4>
                                            <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                Don't be scared of the truth because we need to restart   Owens’ bed design but the back issss...
                                            </p>
                                            <div class="footer">
                                                <div class="author">
                                                     <div class="btn-group">
                                                        <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;">
                                                            <i class="material-icons">remove</i> </button>
                                                        <button class="btn btn-round btn-danger btn-xs" style="padding: 4px 8px !important;" ><span style="line-height: 1.7;"><strong> 3 </strong></span></button>
                                                        <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;"> <i class="material-icons">add</i> </button>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane active" id="comidas" >
                            <div class="row">
                                <div class="col-md-9">
                                    <h4 class="title">Platos extras</h4>
                                    <div class="row collections">
                                        <div class="col-md-4">
                                            <div class="card card-blog shadow" style="background-color: #f2f2f2;">

                                                <div class="card-image">
                                                    <div class="ribbon ribbon-top-right ">
                                                        <span><strong> 30% DTO. </strong></span>
                                                    </div>
                                                    <a href="#pablo">
                                                    <label class="cardprecio label label-primary" > Bs. <strong>50.00</strong> </label>
                                                    <img class="imgcard" src="/img/secondary/a671X671.png" />
                                                    </a>
                                                </div>

                                                <div class="card-content">
                                                    <h4 class="card-title text-center">
                                                        <a href="#pablo">5 Common dos Startup</a>
                                                    </h4>
                                                    <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                        Don't be scared of the truth because we need to restart   Owens’ bed design but the back issss...
                                                    </p>
                                                    <div class="footer">
                                                        <div class="author">
                                                             <div class="btn-group">
                                                                <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;">
                                                                    <i class="material-icons">remove</i> </button>
                                                                <button class="btn btn-round btn-danger btn-xs" style="padding: 4px 8px !important;" ><span style="line-height: 1.7;"><strong> 3 </strong></span></button>
                                                                <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;"> <i class="material-icons">add</i> </button>
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-blog  shadow" style="background-color: #f2f2f2;">
                                                <div class="card-image">
                                                    <div class="ribbon ribbon-top-right ">
                                                        <span><strong> 30% DTO. </strong></span>
                                                    </div>
                                                    <a href="#pablo">
                                                        <label class="cardprecio label label-primary" > Bs. <strong>20.00</strong> </label>
                                                        <img class="imgcard" src="/img/secondary/a461x407.png" />
                                                    </a>
                                                </div>

                                                <div class="card-content">
                                                    <h4 class="card-title text-center">
                                                        <a href="#pablo">5 Common Startup</a>
                                                    </h4>
                                                    <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                        Don't be scared of the truth because we need to restart   Owens’ bed design but the back is...PRUEBA
                                                    </p>
                                                    <div class="footer">
                                                        <div class="author">
                                                             <div class="btn-group">
                                                                <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;">
                                                                    <i class="material-icons">remove</i> </button>
                                                                <button class="btn btn-round btn-danger btn-xs" style="padding: 4px 8px !important;" ><span style="line-height: 1.7;"><strong> 3 </strong></span></button>
                                                                <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;"> <i class="material-icons">add</i> </button>
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-blog shadow" style="background-color: #f2f2f2;">

                                                <div class="card-image">
                                                    <div class="ribbon ribbon-top-right ">
                                                        <span><strong> 30% DTO. </strong></span>
                                                    </div>
                                                    <a href="#pablo">
                                                    <label class="cardprecio label label-primary" > Bs. <strong>50.00</strong> </label>
                                                    <img class="imgcard" src="/img/secondary/a671X671.png" />
                                                    </a>
                                                </div>

                                                <div class="card-content">
                                                    <h4 class="card-title text-center">
                                                        <a href="#pablo">5 Common dos Startup</a>
                                                    </h4>
                                                    <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                        Don't be scared of the truth because we need to restart   Owens’ bed design but the back issss...
                                                    </p>
                                                    <div class="footer">
                                                        <div class="author">
                                                             <div class="btn-group">
                                                                <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;">
                                                                    <i class="material-icons">remove</i> </button>
                                                                <button class="btn btn-round btn-danger btn-xs" style="padding: 4px 8px !important;" ><span style="line-height: 1.7;"><strong> 3 </strong></span></button>
                                                                <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;"> <i class="material-icons">add</i> </button>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <h4 class="title text-center">Almuerzo del día</h4>
                                    <div class="card almuerzo shadow">
                                        <div class="card-body pb-c"  >
                                            <ul class="list-unstyled">
                                                <li><b>Entrada:</b> Products</li>
                                                <hr class="linea">
                                                <li><b>Sopa:</b> Collections</li>
                                                <hr class="linea">
                                                <li><b>Segundo:</b> Influencers</li>
                                                <hr class="linea">
                                                <li><b>Postre:</b> Likes</li>
                                            </ul>
                                            <h4 class="title">Descripción</h4>
                                            <p class="description text-justify">French luxury footwear and fashion. The footwear has incorporated shiny, red-lacquered soles that have become his signature.</p>
                                            <h4 class="title">Focus</h4>
                                            <div class="text-center">
                                                <button class="btn btn-round btn-rose ">
                                                    <strong> Añadir</strong>
                                                    <i class="material-icons" >add_shopping_cart</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane  connections" id="varios" >
                            <div class="row">
                                <div class="col-md-9 col-md-offset-3">
                                    <div class="col-md-4">
                                        <div class="card card-blog shadow" style="background-color: #f2f2f2;">

                                            <div class="card-image">
                                                <div class="ribbon ribbon-top-right ">
                                                    <span><strong> 30% DTO. </strong></span>
                                                </div>
                                                <a href="#pablo">
                                                <label class="cardprecio label label-primary" > Bs. <strong>50.00</strong> </label>
                                                <img class="imgcard" src="/img/secondary/a671X671.png" />
                                                </a>
                                            </div>

                                            <div class="card-content">
                                                <h4 class="card-title text-center">
                                                    <a href="#pablo">5 Common dos Startup</a>
                                                </h4>
                                                <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                    Don't be scared of the truth because we need to restart   Owens’ bed design but the back issss...
                                                </p>
                                                <div class="footer" >
                                                    <div class="author">
                                                         <div class="btn-group">
                                                            <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;">
                                                                <i class="material-icons">remove</i> </button>
                                                            <button class="btn btn-round btn-danger btn-xs" style="padding: 4px 8px !important;" ><span style="line-height: 1.7;"><strong> 3 </strong></span></button>
                                                            <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;"> <i class="material-icons">add</i> </button>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-blog shadow" style="background-color: #f2f2f2;">

                                            <div class="card-image">
                                                <div class="ribbon ribbon-top-right ">
                                                    <span><strong> 30% DTO. </strong></span>
                                                </div>
                                                <a href="#pablo">
                                                <label class="cardprecio label label-primary" > Bs. <strong>50.00</strong> </label>
                                                <img class="imgcard" src="/img/secondary/a671X671.png" />
                                                </a>
                                            </div>

                                            <div class="card-content">
                                                <h4 class="card-title text-center">
                                                    <a href="#pablo">5 Common dos Startup</a>
                                                </h4>
                                                <p class="card-description text-justify" style="margin-bottom: 0px;">
                                                    Don't be scared of the truth because we need to restart   Owens’ bed design but the back issss...
                                                </p>
                                                <div class="footer" >
                                                    <div class="author">
                                                         <div class="btn-group">
                                                            <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;">
                                                                <i class="material-icons">remove</i> </button>
                                                            <button class="btn btn-round btn-danger btn-xs" style="padding: 4px 8px !important;" ><span style="line-height: 1.7;"><strong> 3 </strong></span></button>
                                                            <button class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;"> <i class="material-icons">add</i> </button>
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
                                            </div>
                                        </div>
                                    </div>
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
                     {{ date('Y') }} &copy; Create By <i class="fa fa-android" aria-hidden="true"></i> Mentrax
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
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="media media-post">
                        <div class="row">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" data-toggle="validator" role="form">
                            @csrf
                            <div class="col-md-4 text-center">
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
                                <div class="media-body">
                                    <div class="row">
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
                                        </div>
                                        <div class="col-md-6">
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group @error('email') has-error is-focused @enderror">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico" value="{{ old('email') }}">
                                                @error('email')
                                                    <span class="has-error text-danger" >
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group @error('direccion') has-error is-focused @enderror">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">room</i>
                                                </span>
                                                <input type="text" class="form-control" name="direccion" placeholder="Dirección especifica" value="{{ old('direccion') }}">
                                                @error('direccion')
                                                    <span class="has-error text-danger" >
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group @error('password') has-error is-focused @enderror">
                                                <span class="input-group-addon">
                                                    <i class="material-icons text-rose">lock_outline</i>
                                                </span>
                                                <input type="password" class="form-control" name="password" required placeholder="Contraseña">
                                                @error('password')
                                                    <span class="has-error text-danger" >
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons text-rose">account_balance_wallet</i>
                                                </span>
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-footer">
                                        <button class="btn btn-default btn-round" type="botton" data-dismiss="modal">
                                            <i class="material-icons">close</i>
                                            CANCELAR
                                        </button>
                                        <button class="btn btn-rose btn-round" type="submit">
                                            <i class="material-icons">person_pin</i>
                                            ENVIAR
                                        </button>
                                    </div>
                                </div>
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

</body>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('assets/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/nouislider.min.js') }}" ></script>
    <script src="{{ asset('assets/bootstrap-datetimepicker.js') }}" ></script>
</html>
