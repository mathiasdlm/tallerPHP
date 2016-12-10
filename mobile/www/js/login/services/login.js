/**
 * @ngdoc service
 * @name Orders
 * @description
 * _Please update the description and dependencies._
 *
 * */
angular.module('app.login')

  .service('UserService', function ($http, CONFIG) {
    var signIn = function(userData) {

      return $http.post(CONFIG.URL + '/login', userData);
    };

    return {
        signIn : signIn
    }

  });

