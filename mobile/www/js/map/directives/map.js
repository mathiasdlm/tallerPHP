angular.module('app')

  .directive('map', function() {
    return {
      restrict  : 'E',
      scope     : {
        onCreate : '&'
      },
      link      : function ($scope, $element, $attr) {
        function initialize() {
          var position = {
            lat   : 43.07493,
            long  : -89.381388
          };

          var zoom = {
            value : 16
          };

          if($attr.centerOnLatitude && $attr.centerOnLongitude){
            position.lat  = $attr.centerOnLatitude;
            position.long = $attr.centerOnLongitude;
          }

          if($attr.zoom){
            zoom.value = parseInt($attr.zoom);
          }

          var mapOptions = {
            zoom              : zoom.value,
            center            : new google.maps.LatLng(position.lat, position.long),
            mapTypeId         : google.maps.MapTypeId.ROADMAP,
            mapTypeControl    : false,
            streetViewControl : false
          };

          var map = new google.maps.Map($element[0], mapOptions);

          $scope.onCreate({ map : map });

          // Stop the side bar from dragging when mousedown/tapdown on the map
          google.maps.event.addDomListener($element[0], 'mousedown', function (e) {
            e.preventDefault();
            return false;
          });
        }

        if (document.readyState === "complete") {
          initialize();
        } else {
          google.maps.event.addDomListener(window, 'load', initialize);
        }
      }
    }
  });
