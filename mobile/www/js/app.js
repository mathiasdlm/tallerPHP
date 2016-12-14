angular.module('app', [
  'ionic',
]).constant("CONFIG", {
  "URL" : "/api/",
  "IDENTITY" : null
})
.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if (window.StatusBar) {
      StatusBar.styleLightContent();
    }
  });
}).config(function($stateProvider, $urlRouterProvider, $httpProvider) {
  $stateProvider
    /**
     * welcome screen
     */
    .state('welcome', {
      url         : '/welcome',
      controller  : 'LoginCtrl',
      cache       : false,
      templateUrl : 'templates/welcome.html'
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
      cache: false,
      views: {
        'view-container': {
          templateUrl: 'templates/locations/_view.html',
          controller: 'LocationsCtrl'
        }
      }
    })
    .state('locations.list', {
      url: '/list',
      cache: false,
      views: {
        'view-container': {
          templateUrl: 'templates/locations/_list.html',
          controller: 'LocationsCtrl'
        }
      }
    })
    .state('locations.detail', {
      url: '/detail/:id',
      cache: false,
      views: {
        'view-container': {
          templateUrl: 'templates/locations/_detail.html',
          controller: 'MapDetailCtrl'
        }
      }
    })
    .state('fav', {
      url: '/fav',
      cache: false,
      controller: 'FavoritoCtrl',
      templateUrl: "templates/locations/_fav.html"
    })
  ;

  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/welcome');
});
