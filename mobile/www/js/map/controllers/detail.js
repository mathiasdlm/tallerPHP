
angular.module('app.map')

  .controller('MapDetailCtrl', function ($scope, InmuebleService, FavoritoService, $stateParams, $ionicLoading) {

    $ionicLoading.show();

    InmuebleService.getById($stateParams.id).then(function(inmueble){
      inmueble['imagen'] = 'http://y2aa-uploads.dev/' + (inmueble.imagen1 || inmueble.imagen2 || inmueble.imagen3);

      $scope.inmueble = inmueble;

      $ionicLoading.hide();
    });

    $scope.addFavorito = function(){

    }

    $scope.removeFavorito = function(){

    }

  });
