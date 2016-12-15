<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */

$this->title = 'Inmuebles';
//$this->params['breadcrumbs'][] = ['label' => 'Inmuebles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>



<div class="inmueble-view">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if(Yii::$app->user->identity->rol === 10){?>

            <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Esta seguro que desea eliminar este inmueble?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'lat',
            'lon',
            'cantDormitorios',
            'cantBanos',
            'metrosTotales',
            'metrosEdificados',
            [
            'attribute' => 'Cochera',
            'value' =>  $model->getCochera($model->id)
            ],
            [
            'attribute' => 'Patio',
            'value' =>  $model->getPatio($model->id)
            ],
            [
            'attribute' => 'Cliente',
            'value' =>  $model->getCliente()->one()->nombre
            ],
            [
            'attribute' => 'Inmueble',
            'value' =>  $model->nombre
            ],
        ],
    ]) ?>

</div>

