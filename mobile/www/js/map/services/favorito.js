/**
 * @ngdoc service
 * @name Projects
 * @description
 * _Please update the description and dependencies._
 *
 * */
angular.module('app.map')

  .service('FavoritoService', function ($q, $http, CONFIG) {

    var getAll = function(usuarioId){
        var defer = $q.defer();

        $http.get(CONFIG.URL + 'v1/user/' + usuarioId + '/favoritos')
        .success(function (datos) {
            defer.resolve(datos);
        })
        .error(function(){
            defer.reject('server error')
        });

        return defer.promise;
    };

    var add = function(usuarioId, favorito){
        var defer = $q.defer();

        $http.post(CONFIG.URL + 'v1/user/' + usuarioId + '/favoritos', favorito)
        .success(function (datos) {
            defer.resolve(datos);
        })
        .error(function(){
            defer.reject('server error')
        });

        return defer.promise;
    };

    var remove = function(usuarioId, favoritoId){
        var defer = $q.defer();

        $http.delete(CONFIG.URL + 'v1/user/' + usuarioId + '/favoritos', favoritoId)
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

