<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HorarioAtencion */

$this->title = 'Horarios';
//$this->params['breadcrumbs'][] = ['label' => 'Horario Atencions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horario-atencion-view">

   <!-- <h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este Horario?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'horaDesde',
            'horaHasta',
            [
            'attribute' => 'Cliente',
            'value' =>  $model->getClientes()->one()->nombre
            ],
           [
            'attribute' => 'Inmueble',
            'value' =>  $model->getInmueble()->one()->nombre
            ],
        ],
    ]) ?>

</div>
