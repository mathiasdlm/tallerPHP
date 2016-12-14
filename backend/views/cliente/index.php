<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">
    
    <?php if(Yii::$app->user->identity->rol === 10 || Yii::$app->user->identity->rol === 20){?>
        <p>
            <?= Html::a('Alta Cliente', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php }?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'telefono',
            'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
