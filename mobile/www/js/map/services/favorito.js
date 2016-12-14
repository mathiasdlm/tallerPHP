/**
 * @ngdoc service
 * @name Projects
 * @description
 * _Please update the description and dependencies._
 *
 * */
angular.module('app')

  .service('FavoritoService', function ($q, $http, CONFIG) {

    var getAll = function(){
        var defer = $q.defer();

        $http({
            method: 'GET',
            url: CONFIG.URL + 'v1/user/favorito',
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

    var add = function(favorito){
        var defer = $q.defer();

        $http({
            method: 'POST',
            url: CONFIG.URL + 'v1/user/favorito',
            data: favorito,
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

    var remove = function(idInmueble){
        var defer = $q.defer();

        $http({
            method: 'DELETE',
            url: CONFIG.URL + 'v1/user/favorito/' + idInmueble,
            headers: {
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
      add     : add,
      getAll  : getAll,
      remove  : remove
    }

  });

