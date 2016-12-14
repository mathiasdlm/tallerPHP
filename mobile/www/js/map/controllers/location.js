
angular.module('app')

  .controller('LocationsCtrl', function ($scope, InmuebleService, $ionicLoading, $state, CONFIG) {
    if(!CONFIG.IDENTITY){
      $state.go('welcome');
      return;
    }

    $scope.mapCreated = function(map) {
      $scope.map = map;
    };

    $scope.viewAllProjects = function(){
      $state.go('locations.list');
    };

    $scope.viewAllFavs = function(){
      $state.go('fav');
    };

    ionic.Platform.ready(function(){
      navigator.geolocation.getCurrentPosition(function (pos) {
        if(!$scope.map){
          return;
        }

        $scope.map.setCenter(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude));
        $scope.map.setZoom(13);
      }, function (error) {
        alert('Unable to get location: ' + error.message);
      });

      InmuebleService.getAll().then(function(collection) {
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
