angular.module('app', [
  'ionic',
  'app.login',
  'app.map',
]).constant("CONFIG", {
  "URL" : "/api/",
}).
run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if (window.StatusBar) {
      StatusBar.styleLightContent();
    }
  });
}).config(function($stateProvider, $urlRouterProvider) {

  $stateProvider
    /**
     * welcome screen
     */
    .state('welcome', {
      url: '/welcome',
      controller: 'LoginCtrl',
      templateUrl: "templates/welcome.html"
    })

    /**
     * map states
     */
    .state('locations', {
      url: '/locations',
      abstract: true,
      templateUrl: "templates/locations/abstract.html"
    })

    .state('locations.view', {
      url: '/view',
      views: {
        'view-container': {
          templateUrl: 'templates/locations/_view.html',
          controller: 'LocationsCtrl'
        }
      }
    })
    .state('locations.list', {
      url: '/list',
      views: {
        'view-container': {
          templateUrl: 'templates/locations/_list.html',
          controller: 'LocationsCtrl'
        }
      }
    })
    .state('locations.detail', {
      url: '/detail/:id',
      views: {
        'view-container': {
          templateUrl: 'templates/locations/_detail.html',
          controller: 'MapDetailCtrl'
        }
      }
    })
    .state('fav', {
      url: '/fav',
      controller: 'FavoritoCtrl',
      templateUrl: "templates/locations/_fav.html"
    })
  ;

  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/welcome');
});
