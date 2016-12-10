<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Informacion Inmueble';
//$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmueble-view">

  <!--  <h1><?= Html::encode($this->title) ?></h1>-->
    <?php if(!Yii::$app->user->isGuest){?>
      
        <?php Pjax::begin(['id'=>'pjax-job-gridview-rodro', 'enablePushState'=>false, 'enableReplaceState'=>false]) ?>

            <?php $form = ActiveForm::begin(['action'=>'favorito', 'method'=>'post','options' => ['data-pjax' => true ]]); ?>
                <?php if(!isset($fav)){ ?> 
                    <?= $form->field($model, 'id')->hiddenInput()->label(false)  ?>
                    <?= Html::submitButton('<i class="glyphicon glyphicon-star"></i>', ['class' => 'btn btn-default pull-right']) ?>
 
                <?php } else { ?>
                    <i class="glyphicon glyphicon-star"></i>
                <?php } ?>
            <?php ActiveForm::end(); ?>
        <?php Pjax::end()?>

    <?php }?>
    <?= DetailView::widget([
        'model' => $model,
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

</div>