function initialize()
{
    var myLatLng = {lat: -19.589263, lng: -65.754102};
    var map = new google.maps.Map(document.getElementById('map-canvas'),
    {
        center: myLatLng,
        //mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeId: google.maps.MapTypeId.SATELLITE,
        scrollwheel: true,
        zoom: 16
    });
    var marker = new google.maps.Marker({
      map: map,
      draggable: true,
      position: myLatLng,
      title: 'Está ubicación!'
    });

    /*AQUI UBICACION*/

    /*HASTA AQUI LA UBICACION*/

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
          //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

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