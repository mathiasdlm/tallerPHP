<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */

?>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcAgAtT3jBJNq3yDLNd7avf42nzy0aWck&callback=initMap">
    </script>
<style type="text/css">
  html, body { height: 100%; margin: 0; padding: 0; }
  #map { height: 200px; }
</style>

<div id="map"></div>
    

    <script type="text/javascript">

var map;
var myLatLng = {lat: -34.906542, lng: -56.183524};


function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
    center: myLatLng,
    zoom: 15

  });
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    draggable: true,
    title: 'Nueva Propiedad'

  });



google.maps.event.addListener(marker, 'dragend', function(event) {
	document.getElementById('inmueble-lat').value = event.latLng.lat();
    document.getElementById('inmueble-lon').value = event.latLng.lng();
 } );

}


    </script>
    

<?php
$this->title = 'Alta Inmueble';
//$this->params['breadcrumbs'][] = ['label' => 'Inmuebles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmueble-create">

   <!-- <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
