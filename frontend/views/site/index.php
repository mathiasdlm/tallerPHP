<?php
use backend\models\Inmueble;

$this->title = 'QuieroCasa.com.uy';
?>
<style>
  #map {
    height: 560px;
  }
</style>
<div class="site-index">
    <div class="jumbotron">
      <div class="container">
        <h1>Bienvenido a QuieroCasa.com.uy</h1>
        <p>Un portal donde usted va a poder encontrar las propiedades que anda buscando</p>
      </div>
    </div>
    <div class="container-fluid">
        <div class="col-xs-12 col-md-12">
            <div id="map"></div>
        </div>
    </div>
</div>

<script>
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom    : 7,
      center  : { lat : -32.88223840399703, lng : -56.029715406250034 }
    });

  <?php foreach (Inmueble::find()->all() as $prop) {?>
    var contentString<?php echo $prop->id ?> = 
    '<div id="content">'+
      '<h4><?php echo $prop->nombre ?></h4>'+
      '<p>Para ver el detalle haga <a href="/site/view?id=<?php echo $prop->id ?>">click aqui</a></p>'+
    '</div>';

    var infowindow<?php echo $prop->id ?> = new google.maps.InfoWindow({
      content : contentString<?php echo $prop->id ?>
    });

    var marker<?php echo $prop->id ?> = new google.maps.Marker({
      map       : map,
      title     : '<?php echo $prop->nombre ?>',
      position  : { lat : <?php echo $prop->lat ?>, lng : <?php echo $prop->lon ?> },
    });

    marker<?php echo $prop->id ?>.addListener('click', function() {
      infowindow<?php echo $prop->id ?>.open(map, marker<?php echo $prop->id ?>);
    });
  <?php } ?>
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.21&key=AIzaSyB16sGmIekuGIvYOfNoW9T44377IU2d2Es&libraries=weather,geometry,visualization,places&callback=initMap"></script>
