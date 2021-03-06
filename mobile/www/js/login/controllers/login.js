
angular.module('app')

  .controller('LoginCtrl', function ($scope, $ionicModal, $timeout, $state, $ionicPopup, $window, UserService, CONFIG) {
    // Form data for the login modal
    $scope.loginData = {};

    $ionicModal.fromTemplateUrl('templates/login/login.html', {
      scope: $scope
    }).then(function(modal) {
      $scope.modal = modal;
    });

    // Triggered in the login modal to close it
    $scope.closeLogin = function() {
      $scope.modal.hide();
      $state.go('locations.view');
    };

    $scope.backToWelcomePage = function(){
      $scope.modal.hide();
      $state.go('welcome');
    };

    $scope.login = function() {
      $scope.modal.show();
    };

    $scope.doLogin = function() {
      var loginData = $scope.loginData;

      var username = loginData.username;
      var password = loginData.password;

      if (username !== undefined && password !== undefined) {
        UserService.signIn(loginData).success(function(data) {
          CONFIG.IDENTITY = data;
          $scope.closeLogin();
        }).error(function(status, data) {
          alert('Invalida combinacion de username y password')
        });
      }
    };

  });
