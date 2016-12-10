
angular.module('app.map')

  .controller('MapDetailCtrl', function ($scope, InmuebleService, $stateParams, $ionicLoading) {

    $ionicLoading.show();

    InmuebleService.getById($stateParams.id).then(function(project){
      $scope.project = project;
      $ionicLoading.hide();
    });

  });
