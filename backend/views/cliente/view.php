<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Informacion Cliente';
//$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

  <!--  <h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if(Yii::$app->user->identity->rol === 10){?>

            <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Esta seguro que desea eliminar este cliente?',
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
            'telefono',
            'email:email',
        ],
    ]) ?>

</div>
