
angular.module('app')

  .controller('FavoritoCtrl', function ($scope, FavoritoService, $ionicLoading, $state, CONFIG) {
    if(!CONFIG.IDENTITY){
      $state.go('welcome');
      return;
    }

    ionic.Platform.ready(function(){
      FavoritoService.getAll().then(function(collection) {
        angular.forEach(collection, function(favorito) {
          favorito['imagen'] = 'http://y2aa-uploads.dev/' + (favorito.inmueble.imagen1 || favorito.inmueble.imagen2 || favorito.inmueble.imagen3);
        });

        $scope.favoritos = collection;
      });
    });

  });
