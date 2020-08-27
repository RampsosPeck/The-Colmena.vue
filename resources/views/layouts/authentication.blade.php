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
    <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALsfWww_p2mj2KjasPSKbPzCR3pXsbvdc&libraries=places&callback=initialize" async defer></script>
    <script src="/js/mapInput.js"></script>


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
                                 Carrito</b>
                                 <span class="label label-warning"> {{ $productsCount }}</span>
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
<script type="text/javascript">

    function initMap() {
        var myLatLng = {lat: -19.58416272813471, lng: -65.7566471661072};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: myLatLng,
          scrollwheel: true,
          zoom: 16
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          draggable: true,
          position: myLatLng,
          title: 'Está ubicación!'
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

        google.maps.event.addListener(searchBox,'places_changed', function(){

            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;

            for(i=0; place=place[i];i++)
            {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }
            map.fitBounds(bounds);
            map.setZoom(15);

        });

        google.maps.event.addListener(marker,'position_changed',function(){

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);

        });
        //Código p[ara mi geolocalizacón
        var infoWindow = new google.maps.InfoWindow({map: map});

          // Empieza la Geolocalización con HTML5
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };

              infoWindow.setPosition(pos);
              infoWindow.setContent('Estás aqui!!!');
              map.setCenter(pos);
            }, function() {
              handleLocationError(true, infoWindow, map.getCenter());
            });
          } else {
            // Si el navegador no admite la localización
            handleLocationError(false, infoWindow, map.getCenter());
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
              infoWindow.setPosition(pos);
              infoWindow.setContent(browserHasGeolocation ?
                                    'Error: El servicio de Geolocalización falló.' :
                                    'Error: Su navegador no admite geolocalización.');
            }
    }
    function initAutocomplete()
    {
        var myLatLng = {lat: -19.58416272813471, lng: -65.7566471661072};
        var map = new google.maps.Map(document.getElementById('map-canvas'),
        {
            center: myLatLng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: true,
            zoom: 16
        });
        var marker = new google.maps.Marker({
          map: map,
          draggable: true,
          position: myLatLng,
          title: 'Está ubicación!'
        });



        google.maps.event.addListener(marker,'position_changed',function(){

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);

        });
            //[Iniciando]
              // cuadro de Busqueda para vicular con la vista del usuario.
              var input = document.getElementById('mibusqueda');
              var searchBox = new google.maps.places.SearchBox(input);
              map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

              // Mandar a la vista del mapa
              map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
              });

              var markers = [];

              // Escucha el evento disparado cuando el usuario selecciona una predicción y recupera
              searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                  return;
                }

                // Borrar los viejos marcadores.
                markers.forEach(function(marker) {
                  marker.setMap(null);
                });
                markers = [];

                // Para cada lugar, obtener el icono, el nombre y la ubicación.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                  var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                  };

                  // Cree un marcador para cada lugar.
                  markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                  }));

                  if (place.geometry.viewport) {

                    bounds.union(place.geometry.viewport);
                  } else {
                    bounds.extend(place.geometry.location);
                  }
                });
                map.fitBounds(bounds);
              });
              // [FIN]
        //Código p[ara mi geolocalizacón
        var infoWindow = new google.maps.InfoWindow({map: map});

          // Empieza la Geolocalización con HTML5
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };

              infoWindow.setPosition(pos);
              infoWindow.setContent('Estás aqui!!!');
              map.setCenter(pos);
            }, function() {
              handleLocationError(true, infoWindow, map.getCenter());
            });
          } else {
            // Si el navegador no admite la localización
            handleLocationError(false, infoWindow, map.getCenter());
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
              infoWindow.setPosition(pos);
              infoWindow.setContent(browserHasGeolocation ?
                                    'Error: El servicio de Geolocalización falló.' :
                                    'Error: Su navegador no admite geolocalización.');
            }
}

</script>

</html>

