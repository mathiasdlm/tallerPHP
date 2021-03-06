<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Usuarios';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        
     <?php if(Yii::$app->user->identity->rol === 10){?>

        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este Usuario?',
                'method' => 'post',
            ],
        ]) ?>
        <?php }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
           //'auth_key',
           //'password_hash',
           // 'password_reset_token',
            'email:email',
            [
            'attribute' => 'Estado',
            'value' =>  $model->getEstado($model->id)
            ],
          //  'created_at',
          //  'updated_at',
           
        ],
    ]) ?>

</div>
