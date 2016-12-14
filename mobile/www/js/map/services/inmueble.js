/**
 * @ngdoc service
 * @name Projects
 * @description
 * _Please update the description and dependencies._
 *
 * */
angular.module('app')

  .service('InmuebleService', function ($q, $http, CONFIG) {
    var getAll = function(){
        var defer = $q.defer();

        $http({
            method: 'GET',
            url: CONFIG.URL + 'v1/inmueble',
            headers: {
              'Content-Type'  : 'application/json',
              'Authorization' : CONFIG.IDENTITY.token_type + ' ' + CONFIG.IDENTITY.access_token
            }
        })
        .success(function (datos) {
            defer.resolve(datos);
        })
        .error(function(){
            defer.reject('server error')
        });

        return defer.promise;
    };

    var getById = function(id){
        var defer = $q.defer();

        $http({
            method: 'GET',
            url: CONFIG.URL + 'v1/inmueble/' + id,
            headers: {
              'Content-Type'  : 'application/json',
              'Authorization' : CONFIG.IDENTITY.token_type + ' ' + CONFIG.IDENTITY.access_token
            }
        })
        .success(function (datos) {
            defer.resolve(datos);
        })
        .error(function(){
            defer.reject('server error')
        });

        return defer.promise;
    };

    return {
      getAll  : getAll,
      getById : getById
    }

  });

