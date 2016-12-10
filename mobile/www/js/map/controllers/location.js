
angular.module('app.map')

  .controller('LocationsCtrl', function ($scope, InmuebleService, $ionicLoading, $state) {
    $scope.mapCreated = function(map) {
      $scope.map = map;
    };

    $scope.viewAllProjects = function(){
      $state.go('locations.list');
    };

    ionic.Platform.ready(function(){
      // navigator.geolocation.getCurrentPosition(function (pos) {
      //   $scope.map.setCenter(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude));
      //   $scope.map.setZoom(16);
      // }, function (error) {
      //   alert('Unable to get location: ' + error.message);
      // });

      var prev_infowindow = null;
      InmuebleService.getAll().then(function(collection) {
        $scope.projects = collection;

        angular.forEach(collection, function(project) {
          var infowindow = new google.maps.InfoWindow({
            content : '<a href="/#/locations/detail/' + project.id + '">' + project.name + '</a>'
          });

          var marker = new google.maps.Marker({
            map       : $scope.map,
            title     : project.name,
            position  : new google.maps.LatLng(project.coordinates.lat,project.coordinates.long),
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
      });

    });
  });
