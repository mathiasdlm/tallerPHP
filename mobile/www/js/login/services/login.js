/**
 * @ngdoc service
 * @name Orders
 * @description
 * _Please update the description and dependencies._
 *
 * */
angular.module('app')

  .service('UserService', function ($http, CONFIG) {
    var signIn = function(userData) {

      userData['grant_type'] = 'password';
      userData['client_id'] = 'testclient';
      userData['client_secret'] = 'testpass';

      return $http.post(CONFIG.URL + 'oauth2/token', userData);
    };

    return {
        signIn : signIn
    }

  });

