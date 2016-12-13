
angular.module('app.map')

  .controller('FavoritoCtrl', function ($scope, FavoritoService, $ionicLoading, $state) {
    ionic.Platform.ready(function(){
      FavoritoService.getAll(1).then(function(collection) {
        var prev_infowindow = null;
        angular.forEach(collection, function(inmueble) {
          inmueble['imagen'] = 'http://y2aa-uploads.dev/' + (inmueble.imagen1 || inmueble.imagen2 || inmueble.imagen3);

          var infowindow = new google.maps.InfoWindow({
            content : '<a href="/#/locations/detail/' + inmueble.id + '">' + inmueble.nombre + '</a>'
          });

          var marker = new google.maps.Marker({
            map       : $scope.map,
            title     : inmueble.nombre,
            position  : new google.maps.LatLng(inmueble.lat, inmueble.lon),
            animation : google.maps.Animation.DROP
          });

          google.maps.event.addListener(marker, 'click', function() {
            if (prev_infowindow) {
              prev_infowindow.close();
            };

            prev_infowindow = infowindow;

            infowindow.open($scope.map, marker);
          });
        });

        $scope.inmuebles = collection;
      });
    });

  });
