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
            'options' => [ 'style' => 'font-color:#FFF000'],
            'attribute' => 'Estado',
            'value'=> function ($model) {
                if($model->status === 20){
                    return 'Activo';
                }else{
                    return 'Inactivo';
                }
              },
            ],
            [        
                'content' => function ($model, $key, $index, $column) {
                    if ($model->status == 20) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id])
                         . Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [ 
                            'data' => [
                            'confirm' => 'Esta seguro que desea eliminar este Usuario?',
                            'method' => 'post',
                            ],

                        ])
                          . Html::a('<span class="glyphicon glyphicon-remove"></span>', ['desactivar', 'id' => $model->id]);
                    }else{
                         return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id])
                        . Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id],
                            [ 
                            'data' => [
                            'confirm' => 'Esta seguro que desea eliminar este Usuario?',
                            'method' => 'post',],
                            ])
                        . Html::a('<span class="glyphicon glyphicon-ok"></span>', ['activar', 'id' => $model->id]);
                        
                    
                }
            }
            ],
        ],
    
    ]); ?>
</div>
