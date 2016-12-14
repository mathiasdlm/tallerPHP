<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Horario Atencion';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horario-atencion-index">

   <!-- <h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Alta Horario Atencion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'horaDesde',
            'horaHasta',
            [
                'attribute' => 'idCliente',
                'value' => function ($model) {
                    return $model->getClientes()->one()->nombre;
                  },
            ],
            [
                'attribute' => 'Inmueble',
                'value' => function ($model) {
                    return $model->getInmueble()->one()->nombre;
                  },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
