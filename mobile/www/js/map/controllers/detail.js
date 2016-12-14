
angular.module('app')

  .controller('MapDetailCtrl', function ($scope, $state, InmuebleService, FavoritoService, $stateParams, $ionicLoading, CONFIG) {
    if(!CONFIG.IDENTITY){
      $state.go('welcome');
      return;
    }

    $ionicLoading.show();

    $scope.fav = null;
    var id = $stateParams.id;

    FavoritoService.getAll().then(function(collection) {
      var favoritos = collection;


      angular.forEach(favoritos, function(favorito) {
        if(favorito.inmueble.id === parseInt(id)){
          $scope.fav = favorito;
          return;
        }
      });

      InmuebleService.getById($stateParams.id).then(function(inmueble){
        inmueble['imagen'] = 'http://y2aa-uploads.dev/' + (inmueble.imagen1 || inmueble.imagen2 || inmueble.imagen3);

        $scope.inmueble = inmueble;

        $ionicLoading.hide();
      });
    });

    $scope.addFavorito = function(){
      var inmueble = this.inmueble;
      var favData = {
        idInmueble : inmueble.id
      }

      FavoritoService.add(favData).then(function(data) {
        $scope.fav = data;
      });
    }

    $scope.removeFavorito = function(){
      var fav = this.fav;

      FavoritoService.remove(fav.inmueble.id).then(function(data) {
        $scope.fav = null;
      });
    }

  });
