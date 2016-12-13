<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\bootstrap\Carousel;
/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Informacion Inmueble';
//$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<style>
  #map {
    height: 560px;
  }
 
    .mapa-detalle{
        margin-bottom: 50px;
    }
</style>
<div class="inmueble-view">

  <!--  <h1><?= Html::encode($this->title) ?></h1>-->
    <?php if(!Yii::$app->user->isGuest){?>
      
        <?php Pjax::begin(['id'=>'pjax-job-gridview-rodro', 'enablePushState'=>false, 'enableReplaceState'=>false]) ?>

            <?php if(!isset($fav)){ ?> 
                <?php $form = ActiveForm::begin(['action'=>'favorito', 'method'=>'post','options' => ['data-pjax' => true ]]); ?>
                    <?= $form->field($inm, 'id')->hiddenInput()->label(false)  ?>
                    <?= Html::submitButton('<i class="glyphicon glyphicon-star"></i>', ['class' => 'btn btn-default pull-right', 'style'=>'    margin: 10px;']) ?>
                <?php ActiveForm::end(); ?>
 
                <?php } else { ?>
                    <?php $form = ActiveForm::begin(['action'=>'dislike', 'method'=>'post','options' => ['data-pjax' => true ]]); ?>
                        <?= $form->field($inm, 'id')->hiddenInput()->label(false)  ?>
            <?= Html::submitButton('<i class="glyphicon glyphicon-star"></i>', ['class' => 'btn btn-default pull-right', 'style'=>'    margin: 10px;background-color: #009922;']) ?>
                    <?php ActiveForm::end(); ?>
                <?php } ?> 
        <?php Pjax::end()?>

    <?php }?>
    <h1><?=$inm->nombre?></h1>
     <?= DetailView::widget([
        'model' => $inm,
        'attributes' => [
            'nombre',
            'cantDormitorios',
            'cantBanos',
            'metrosEdificados',
            'metrosTotales',
            'cochera',
            'patio',
        ],
    ]) ?>
    <h2>Contacto</h2>
    <?= DetailView::widget([
        'model' => $cliente,
        'attributes' => [
            'nombre',
            'telefono',
            'email'
        ],
    ]) ?>
    <h2>Imagenes</h2>
     <?= Carousel::widget([
        'items' => $images
    ]);?>
    <div class="mapa-detalle container-fluid">
        <div class="col-xs-12 col-md-12">
            <div id="map"></div>
        </div>
    </div>
    <?= HTML::activeHiddenInput($inm, 'lon', ["id"=>"lon"]) ?>
    <?= HTML::activeHiddenInput($inm, 'lat', ["id"=>"lat"]) ?>
    <script type="text/javascript">
        var lat = parseInt(document.getElementById('lat').value); 
        var lon = parseInt(document.getElementById('lat').value);


        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom    : 7,
              center  : { lat : lat, lng : lon }
            });

          
            var contentString = 
            '<div id="content">'+
              '<h4><?php echo $inm->nombre ?></h4>' +
            '</div>';

            var infowindow = new google.maps.InfoWindow({
              content : contentString
            });

            var marker = new google.maps.Marker({
              map       : map,
              title     : '<?php echo $inm->nombre ?>',
              position  : { lat : lat, lng : lon },
            });

            marker.addListener('click', function() {
              infowindow.open(map, marker);
            }); 
        }
    </script>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.21&key=AIzaSyB16sGmIekuGIvYOfNoW9T44377IU2d2Es&libraries=weather,geometry,visualization,places&callback=initMap"></script>
</div>