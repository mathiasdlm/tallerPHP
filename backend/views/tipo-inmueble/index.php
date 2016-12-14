<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Inmuebles';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-inmueble-index">

   <!-- <h1><?= Html::encode($this->title) ?></h1>-->
    <?php if(Yii::$app->user->identity->rol === 10){?>

        <p>
            <?= Html::a('Alta Tipo Inmueble', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php }?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
