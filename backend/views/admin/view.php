<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = 'Datos Administrador';
//$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-view">


    <p>
        <?php if(Yii::$app->user->identity->rol === 10){?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este Administrador?',
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
            //'password_reset_token',
            'email:email',
            'status',
            //'created_at',
            //'updated_at',
            'rol',
        ],
    ]) ?>

</div>
