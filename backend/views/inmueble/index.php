<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inmuebles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmueble-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Inmueble', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'coordenadas',
            'cantDormitorios',
            'cantBanos',
            // 'metrosTotales',
            // 'metrosEdificados',
            // 'cochera',
            // 'patio',
            // 'idTipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
