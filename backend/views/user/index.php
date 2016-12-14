<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <!--<?php if(Yii::$app->user->identity->rol === 10){?>
        <p>
            <?= Html::a('Alta Usuario', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php }?>-->
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
             'status'=>[
            'attribute' => 'Activo',
            'value'=> function ($model) {
                if($model->status === 20){
                    return 'Activo';
                }else{
                    return 'Desactivado';
                }
              },
            ],
            // 'created_at',
            // 'updated_at',
            // 'activado',


            [
         
            'class' => 'yii\grid\ActionColumn'
                , 'template' => '{view} {update} {delete} {activar}'
            ],
        ],
    ]); ?>
</div>
