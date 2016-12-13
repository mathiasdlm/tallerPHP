<?php
namespace backend\models;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Cliente;
use backend\models\TipoInmueble;


/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */
/* @var $form yii\widgets\ActiveForm */
?>


<style type="text/css">
  html, body { height: 100%; margin: 0; padding: 0; }
  #map { height: 200px; }
</style>

<div id="map"></div>
    

   
<div class="inmueble-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'lon')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'cantDormitorios')->textInput() ?>

    <?= $form->field($model, 'cantBanos')->textInput() ?>

    <?= $form->field($model, 'metrosTotales')->textInput() ?>

    <?= $form->field($model, 'metrosEdificados')->textInput() ?>

    <?= $form->field($model, 'cochera')->radioList([0 => ' No ', 1 => ' Si']) ?>

    <?= $form->field($model, 'patio')->radioList([0 => ' No ', 1 => ' Si']) ?>

    <?= $form->field($model, 'enAlquiler')->radioList([0 => ' No ', 1 => ' Si']) ?>

    <?= $form->field($model, 'enVenta')->radioList([0 => ' No ', 1 => ' Si']) ?>

    <?= $form->field($model, 'precioAlquiler')->textInput() ?>

    <?= $form->field($model, 'precioVenta')->textInput() ?>

    <?= $form->field($model, 'idTipo')->dropDownList(  

        ArrayHelper::map(TipoInmueble::find()->all(),'id','Nombre'),['prompt'=>'Seleccione un Tipo'])->label('Tipo de Inmueble'); ?>
    
    <?=$form->field($model, 'idCliente')->dropDownList(
        
        ArrayHelper::map(Cliente::find()->all(),'id','nombre'),['prompt'=>'Seleccione un Cliente'])->label('Cliente de Inmueble'); ?>

    <?= $form->field($model, 'upload_file1')->fileInput() ?>
    <?= $form->field($model, 'upload_file2')->fileInput() ?>
    <?= $form->field($model, 'upload_file3')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Alta Inmueble' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
 <script type="text/javascript">

var map;

var latitud;
var longitud;




if(document.getElementById('inmueble-lat').value !== null){
    
    navigator.geolocation.getCurrentPosition(function(pos) {
        latitud = pos.coords.latitude;
        longitud = pos.coords.longitude;
        
        document.getElementById('inmueble-lat').value = latitud;
        document.getElementById('inmueble-lon').value = longitud;
   });
}

$( window ).load(function() {
    var myLatLng = {lat: parseFloat(document.getElementById('inmueble-lat').value), lng: parseFloat(document.getElementById('inmueble-lon').value)};



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


});
    





    </script>

</div>

<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcAgAtT3jBJNq3yDLNd7avf42nzy0aWck&callback=initMap">
    </script>
