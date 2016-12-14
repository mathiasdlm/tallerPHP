<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Administradores';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <?php if(Yii::$app->user->identity->rol === 10){?>
        <p>
            <?= Html::a('Alta Administrador', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php }?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
             'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',
             'rol'=>[
            'attribute' => 'rol',
            'value'=> function ($model) {
                if($model->rol == 10)
                {

                    return 'Administrador';

                } 
                else {
                    return 'Gestion';
                }
              },
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {delete}'],
        ],
    ]); ?>
</div>
