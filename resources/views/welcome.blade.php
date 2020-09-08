<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>La Colmena</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900">

    <meta name="description" content="Sistema de pedidos en linea realizado para la tienda LA COLMENA de la ciudad de Potosi">
    <meta name="author" content="Ing. Jorge Peralta">
    <meta name="keyword" content="Sistema de pedidos en linea, Sistema bajo plataforma web La colmena. En la ciudad de Potosí">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/img/welcome/colmena.svg') }}" />


    <link href="{{ asset('css/principal.css') }}" rel="stylesheet">
    <!--<link href="/styles/css/bootstrap.css" rel="stylesheet">
    <link href="/styles/css/fonts.css" >
    <link href="/styles/css/style.css" rel="stylesheet">-->

    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="preloader">
      <div class="loader">
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
      </div>
    </div>
    <div class="page">

      <div class="position-relative">
        <header class="section page-header" id="programs">
          <!--RD Navbar-->
          <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-classic context-dark" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="10px" data-xl-stick-up-offset="10px" data-xxl-stick-up-offset="10px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
              <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                  <!--RD Navbar Panel-->
                  <div class="rd-navbar-panel">
                    <!--RD Navbar Toggle-->
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <!--RD Navbar Brand-->
                    <div class="rd-navbar-brand">
                      <a class="brand" href="/dashboard">
                        <img class="brand-logo-light" src="{{ asset('/img/welcome/logowel.png') }}" />
                      </a>
                    </div>
                  </div>
                  <div class="rd-navbar-nav-wrap">
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#programs">SERVICIOS</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#about">NOSOTROS</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#productos">PRODUCTOS</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#guia">GUÍA</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#ventajas">VENTAJAS</a>
                      </li>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <button class="rd-navbar-aside-open-toggle" data-custom-toggle="#rd-navbar-aside">
              </button>

              <div class="rd-navbar-aside" id="rd-navbar-aside">
                <h3 class="text-center">INGRESE AL SISTEMA</h3>
                <!--RD Mailform-->
                <form  method="POST" action="{{ route('login') }}"  >
                  @csrf
                  <div class="row ">
                      <div class="col-12">
                        <div class="form-wrap">
                          <div class="form-group row">
                            <label for="email" class="col-sm-5 col-form-label text-md-right text-white"><b>{{ __('Número de celular') }}:</b></label>

                            <div class="col-sm-7">
                                <input type="number" class="form-control bg-light border-0  @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}"  autocomplete="celular" autofocus placeholder="Ingrese su número de celular">

                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group row">
                            <label for="password" class="col-sm-5 col-form-label text-md-right text-white"><b> {{ __('Clave / Contraseña') }}:</b></label>

                            <div class="col-sm-7">
                                <input id="password" type="password" class="form-control bg-light border-0 @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" placeholder="Ingrese su contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      </div>
                      <div class="col-12 text-center" >
                        <button class="button button-primary-wel" type="submit">INICIAR SECIÓN</button>
                      </div>
                  </div>
                </form>
                <br>
                <div class="col-12 text-center" >
                    @if (Route::has('password.request'))
                        <a class="button-primary" href="{{ route('password.request') }}" style="border-radius: 33px;">
                            <b> {{ __('¿Olvidaste tu contraseña?') }} </b>
                        </a>
                    @endif
                </div>
                <hr class="linea-blanca"><br>
                  <h3 class="text-center">REGISTRATE</h3>
                  <!--RD Mailform-->
                  <form  method="POST" action="{{ route('register') }}"  >
                    @csrf
                    <div class="row ">
                        <div class="col-12">
                          <div class="form-wrap">
                            <div class="form-group row">
                              <label for="email" class="col-sm-5 col-form-label text-md-right text-white"> <b>{{ __('Nombre completo') }}:</b></label>

                              <div class="col-sm-7">
                                  <input type="text" class="form-control bg-light border-0  @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}"  autocomplete="fullname" autofocus placeholder="Nombre completo.">

                                  @error('fullname')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-wrap">
                            <div class="form-group row">
                              <label for="email" class="col-sm-5 col-form-label text-md-right text-white"><b>{{ __('Número de celular') }}:</b></label>

                              <div class="col-sm-7">
                                  <input type="number" class="form-control bg-light border-0  @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}"  autocomplete="celular" autofocus placeholder="Ingrese su número de celular">

                                  @error('celular')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group row">
                              <label for="password" class="col-sm-5 col-form-label text-md-right text-white"> <b>{{ __('Dirección de envio') }}:</b> </label>

                              <div class="col-sm-7">
                                  <textarea class="form-control bg-light border-0 @error('direccion') is-invalid @enderror" name="direccion" id="direccion" rows="2" placeholder="Dirección exacta más referencias de envio.">{{ old('direccion') }}</textarea>
                                  @error('direccion')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                        </div>
                        <div class="col-12 text-center" >
                          <button class="button button-primary-wel" type="submit">ENVIAR DATOS</button>
                        </div>
                    </div>
                  </form>
              </div>
            </nav>
          </div>
        </header>
        <!--Swiper-->
        <section class="section swiper-container swiper-slider bg-primary" data-autoplay="3500" data-loop="false" data-simulate-touch="false" data-effect="circle-bg" data-speed="750">
          <div class="swiper-bg-text">Food</div>
          <div class="swiper-wrapper">
            <div class="swiper-slide" data-circle-cx=".855" data-circle-cy=".5" data-circle-r=".39">
              <div class="swiper-slide-caption section-md">
                <div class="container">
                  <div class="row row-50 align-items-center swiper-custom-row">
                    <div class="col-lg-5 pt-2">
                      <h3 class="subtitle" data-swiper-anime='{"animation":"swiperContentRide","duration":900,"delay":900}'>Desde Potosí</h3>
                      <h1 data-swiper-anime='{"animation":"swiperContentRide","duration":1000,"delay":1000}' data-subtext="#1">La Colmena</h1>
                      <p class="big text-justify" data-swiper-anime='{"animation":"swiperContentRide","duration":1100,"delay":1100}'>
                        Le ofrecemos una variedad de productos y ahora puedes realizar tus pedidos en linea.
                      </p>
                      <p class="postitle text-center" data-swiper-anime='{"animation":"swiperContentRide","duration":1200,"delay":1200}'>
                        <a class="button button-primary-wel" href="{{ url('dashboard') }}">Ver Catálogo</a>
                      </p>
                    </div>
                    <div class="box-round-wrap">
                      <img class="imgfirst" style="border-radius: 20% !important;" src="{{ asset('/img/welcome/originalline.png') }}" alt="" width="671" height="335" data-swiper-anime='{"animation":"swiperContentFade","duration":1000,"delay":1000}'  />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" data-circle-cx=".855" data-circle-cy=".5" data-circle-r=".39">
              <div class="swiper-slide-caption section-md">
                <div class="container">
                  <div class="row row-50 align-items-center swiper-custom-row">
                    <div class="col-lg-5 pt-3">
                      <h3 class="subtitle" data-swiper-anime='{"animation":"swiperContentRide","duration":900,"delay":900}'>Las tortas más deliciosas</h3>
                      <h1 data-swiper-anime='{"animation":"swiperContentRide","duration":1000,"delay":1000}' data-subtext="250">TORTAS ESPECIALES</h1>
                      <p class="big text-justify" data-swiper-anime='{"animation":"swiperContentRide","duration":1100,"delay":1100}'>Los mejores pasteles y para todos los gustos, frescos y especiales con un decorado inolvidable.</p>
                      <p class="postitle text-center" data-swiper-anime='{"animation":"swiperContentRide","duration":1200,"delay":1200}'>
                        <a class="button button-primary-wel" href="{{ url('dashboard') }}">Pedir Tortas</a>
                      </p>
                    </div>
                    <div class="box-round-wrap">
                      <img class="imgfirst" src="/img/welcome/torta.png" alt="" width="671" height="335" data-swiper-anime='{"animation":"swiperContentFade","duration":1000,"delay":1000}'/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" data-circle-cx=".855" data-circle-cy=".5" data-circle-r=".39">
              <div class="swiper-slide-caption section-md">
                <div class="container">
                  <div class="row row-50 align-items-center swiper-custom-row">
                    <div class="col-lg-5 pt-3">
                      <h3 class="subtitle" data-swiper-anime='{"animation":"swiperContentRide","duration":900,"delay":900}'>Las comidas más sabrosas</h3>
                      <h1 data-swiper-anime='{"animation":"swiperContentRide","duration":1000,"delay":1000}' data-subtext="100%">Comida deliciosa</h1>
                      <p class="big text-justify" data-swiper-anime='{"animation":"swiperContentRide","duration":1100,"delay":1100}'>Una variedad de platos a la carta y almuerzos para que deguste de la mejor comida más deliciosa.</p>
                      <p class="postitle text-center" data-swiper-anime='{"animation":"swiperContentRide","duration":1200,"delay":1200}'>
                        <a class="button button-primary-wel" href="{{ url('dashboard') }}">Pedir platos a la carta</a>
                      </p>
                    </div>
                    <div class="box-round-wrap">
                      <img class="imgfirst" src="/img/welcome/671X671_b.png" alt="" width="671" height="335" data-swiper-anime='{"animation":"swiperContentFade","duration":1000,"delay":1000}'/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" data-circle-cx=".855" data-circle-cy=".5" data-circle-r=".39">
              <div class="swiper-slide-caption section-md">
                <div class="container">
                  <div class="row row-50 align-items-center swiper-custom-row">
                    <div class="col-lg-5 pt-3">
                      <h3 class="subtitle" data-swiper-anime='{"animation":"swiperContentRide","duration":900,"delay":900}'>Realiza tu pedido en linea</h3>
                      <h1 data-swiper-anime='{"animation":"swiperContentRide","duration":1000,"delay":1000}' data-subtext="3k">Servicio de entrega</h1>
                      <p class="big text-justify" data-swiper-anime='{"animation":"swiperContentRide","duration":1100,"delay":1100}'>Nuestros clientes confian en nosotros por deleitar su paladar más de una decada.</p>
                      <p class="postitle text-center" data-swiper-anime='{"animation":"swiperContentRide","duration":1200,"delay":1200}'>
                          <a class="button button-primary-wel" href="{{ url('dashboard') }}">Ver Catálogo</a>
                      </p>
                    </div>
                    <div class="box-round-wrap"><img src="/img/welcome/delivery-man.svg" alt="" width="671" height="335" data-swiper-anime='{"animation":"swiperContentFade","duration":1000,"delay":1000}'/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Swiper Pagination-->
          <div class="swiper-pagination"></div>
        </section>
      </div>
      <!-- About
      <section class="section novi-bg novi-bg-img section-sm bg-gray-100 pb-xl-0" id="about" style="background-image: url('../img/welcome/login.jpg');
  background-repeat: no-repeat;
  background-size: cover;">-->
      <section class="section novi-bg novi-bg-img section-sm bg-gray-100 pb-xl-0" id="about" style="background-image: url('../img/welcome/image.png');
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

        <div class="container">
          <div class="row row-50 flex-wrap-md-reverse flex-lg-wrap align-items-lg-center">
            <div class="col-xl-6 col-lg-6"><!--images/shutter-home-01-455x685.png-->
              <div class="box-custom-2">
                <img src="/img/welcome/abe12.png" alt="" width="455" height="342"/>
                <div class="box-custom-2-smal">
                  <p class="box-custom-2-name">Doña Abelina</p>
                  <p class="box-custom-2-position">Jefa de cocina</p>
                </div>
              </div>
            </div>
            <div class="col-xl-5 col-lg-6">
              <div class="box-custom-1 text-white">
                <h3 class="text-white">Sobre nosotros</h3>
                <h2 class="text-white">La comida más sabrosa.</h2>
                <p>La colmena le ofrece una variedad de productos de alta calidad para su paladar, realice su pedido en linea.</p>
                <ul class="list-marked">
                  <li class="text-white">Los decorados personalizados para cada torta.</li>
                  <li class="text-white">Los ingredientes más frescos para cada plato.</li>
                </ul>
                <div class="text-center justify-content-center pt-3">
                  <a class="button button-primary-wel" href="{{ url('dashboard') }}">Ver Catálogo</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- What we Offer-->
      <section class="section novi-bg novi-bg-img section-md-4 bg-primary" id="productos">
        <div class="container">
          <div class="text-center">
            <h3>Lo que ofrecemos</h3>
            <h2>Los paquetes de alimentos</h2>
          </div>
          <div class="row row-50 justify-content-center">
            <div class="col-xl-4 col-md-6">
              <!-- Product-->
              <div class="product novi-bg bg-default">
                <h3 class="product-title">COMIDAS</h3>
                <img class="product-img" src="/img/welcome/671X671_b.png" alt="" width="176" height="88"/>
                <div class="product-price">
                  <div class="product-price-header">
                    <div class="product-price-currency">Bs.</div>
                    <div class="product-price-value"> 12</div>
                  </div>
                  <div class="product-price-footer">DESDE</div>
                </div>
                <p class="product-text text-justify">La mejor opción si estas buscando la comida más sabrosa fresca y a buen precio.</p>
                <div class="cel-pro">
                    <a class="button button-primary" href="{{ url('dashboard') }}">Ordenar ahora.</a>
                </div>

                <!--<div>
                  <a class="link-border" href="#">Ver Catálogo</a>
                </div>-->
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <!-- Product-->
              <div class="product novi-bg bg-default">
                <h3 class="product-title">TORTAS</h3>
                <img class="product-img" src="/img/welcome/671x671.png" alt="" width="176" height="88"/>
                <div class="product-price">
                  <div class="product-price-header">
                    <div class="product-price-currency">Bs.</div>
                    <div class="product-price-value">50</div>
                  </div>
                  <div class="product-price-footer">DESDE</div>
                </div>
                <p class="product-text text-justify">Las tortas más deliciosas con decoraciones inolvidables únicos a gusto del cliente.</p>
                <div class="cel-pro">
                    <a class="button button-primary" href="{{ url('dashboard') }}">Ordenar ahora</a>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <!-- Product-->
              <div class="product novi-bg bg-default">
                <h3 class="product-title">TIENDA</h3><img class="product-img" src="/img/welcome/products.svg" alt="" width="176" height="88"/>
                <div class="product-price">
                  <div class="product-price-header">
                    <div class="product-price-currency">Bs.</div>
                    <div class="product-price-value">10</div>
                  </div>
                  <div class="product-price-footer">DESDE</div>
                </div>
                <p class="product-text text-justify">Le ofrecemos distintos productos desde refrescos y mucho más con un envio rápido y seguro.</p>
                <div class="cel-pro">
                    <a class="button button-primary" href="{{ url('dashboard') }}">Ordenar ahora</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- How it Works-->
      <section class="section novi-bg novi-bg-img section-md-2 bg-default" id="guia">
        <div class="container">
          <div class="text-center">
            <h3>¿Cómo funciona?</h3>
            <h2>En tres simples pasos</h2>
          </div>
          <div class="row row-50 post-classic-counter justify-content-lg-between justify-content-center">
            <div class="col-lg-4 col-sm-6">
              <div class="post-classic novi-bg bg-secondary-1">
                <h3 class="post-classic-title">Seleccione sus productos</h3>
                <p class="post-classic-text text-justify">Añanada los productos que desea adquirir a su carrito de compras sin necesidad de registrarse.</p>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="post-classic novi-bg bg-secondary-2">
                <h3 class="post-classic-title">Inserte sus datos y ubicación</h3>
                <p class="post-classic-text text-justify">Una vez verificado los productos en su carrito de compras inserte sus datos personales y su ubicación .</p>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="post-classic novi-bg bg-secondary-3">
                <h3 class="post-classic-title">Verifique el estado de su pedido.</h3>
                <p class="post-classic-text text-justify">Ya enviado el pedido, verifique el estado ingresando al sistema con su Nro. celular como usuario y contraseña.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Advantages-->
      <section class="section novi-bg novi-bg-img section-custom section-lg bg-primary" id="ventajas">
        <div class="container">
          <div class="row row-fix">
            <div class="col-lg-7">
              <div class="row row-40">
                <div class="col-md-6">
                  <div class="box-icon">
                    <div class="box-icon-header">
                      <div class="icon novi-icon icon-lg linearicons-diamond2"></div>
                      <h3 class="box-icon-title">CALIDAD</h3>
                    </div>
                    <p class="box-icon-text text-justify">Realizamos los productos con la mayor limpieza para asegurarnos de ofrecerle los platos de la mejor calidad, tortas y servicio.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-icon">
                    <div class="box-icon-header">
                      <div class="icon novi-icon icon-lg linearicons-leaf"></div>
                      <h3 class="box-icon-title">Diseño Unico</h3>
                    </div>
                    <p class="box-icon-text text-justify">Realizamos todo tipo de decorados inolvidables en las tortas para todo acontecimiento social.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-icon">
                    <div class="box-icon-header">
                      <div class="icon novi-icon icon-lg linearicons-chef"></div>
                      <h3 class="box-icon-title">Sabroso</h3>
                    </div>
                    <p class="box-icon-text text-justify">Gran y sabor inolvidable de nuestros platos es lo que atrae a más y más clientes a La Colmena.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-icon">
                    <div class="box-icon-header">
                      <div class="icon novi-icon icon-lg linearicons-egg2"></div>
                      <h3 class="box-icon-title">DIVERSO</h3>
                    </div>
                    <p class="box-icon-text text-justify">Actualizamos regularmente los menús para ofrecerle la mejor diversidad de alimentos cada vez que ordena.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-custom-3">
          <div class="box-custom-3-img-wrap">
            <img src="/img/welcome/a461x407.png" alt="" width="382" height="187"/>
          </div>
          <div class="box-custom-3-img-wrap"><img src="/img/welcome/comida3.png" alt="" width="293" height="146"/>
          </div>
          <div class="box-custom-3-img-wrap"><img src="/img/welcome/461x407.png" alt="" width="461" height="203"/>
          </div>
          <div class="box-custom-3-img-wrap"><img src="/img/welcome/671x671_d.png" alt="" width="191" height="95"/>
          </div>
        </div>
      </section>

      <!-- Testimonials-->
      <section class="section novi-bg novi-bg-img section-md-3 bg-default">
        <div class="container">
          <div class="row row-40 align-items-center">
            <div class="col-lg-6">
              <div class="owl-pagination-custom" id="owl-pagination-custom">
                <div class="data-dots-custom" data-owl-item="0">
                  <img src="/img/welcome/persona1.jpg" alt="" width="179" height="89"/>
                </div>
                <div class="data-dots-custom" data-owl-item="1"><img src="/img/welcome/persona3.jpg" alt="" width="306" height="153"/>
                </div>
                <div class="data-dots-custom" data-owl-item="2"><img src="/img/welcome/persona2.jpg" alt="" width="179" height="89"/>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <h3>Nuestros Clientes</h3>
              <h2>TESTIMONIOS</h2>
              <!-- Owl Carousel-->
              <div class="quote-classic-wrap">
                <div class="quote-classic-img">
                  <img src="img/welcome/customer.svg" alt="" width="37" height="14"/>
                </div>
                <div class="owl-carousel owl-carousel-classic" data-items="1" data-dots="true" data-loop="false" data-autoplay="false" data-mouse-drag="false" data-dots-custom="#owl-pagination-custom">
                  <div class="quote-classic">
                    <p class="big text-justify">He probado un montón de servicios de entrega de comida, pero la colmena es algo fuera de este mundo! Su comida es muy saludable y que sabe muy bien, por lo que recomiendo a todos mis amigos!</p>
                    <h3 class="quote-classic-name">Sofía Romero</h3>
                  </div>
                  <div class="quote-classic">
                    <p class="big text-justify">Tanto la comida como el servicio al cliente son excelentes en todos los sentidos, y yo sólo quería expresar lo feliz que estoy. ¡Le deseamos todo lo mejor!</p>
                    <h3 class="quote-classic-name">Andres Montes</h3>
                  </div>
                  <div class="quote-classic">
                    <p class="big text-justify">Gracias por esa calidad en el diseño. La torta que pedi estuvo genial.</p>
                    <h3 class="quote-classic-name">Margarita Cortez</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div style="height: 150px; overflow: hidden;" >
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
          <path d="M-0.84,74.50 C149.99,150.00 307.28,150.48 502.54,81.41 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #550A21;">
          </path>
        </svg>
      </div>
      <footer class="section footer-classic text-center">
         <div class="text-center">
            <strong> "La Colmena" - {{ date('Y') }} Created by © Mentrax </strong>
         </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>

    <script src="{{ asset('js/principal.js') }}" ></script>

  </body>
</html>
















