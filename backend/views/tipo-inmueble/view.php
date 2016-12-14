<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipoInmueble */

$this->title = 'Tipos de Inmuebles';
//$this->params['breadcrumbs'][] = ['label' => 'Tipo Inmuebles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-inmueble-view">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?php if(Yii::$app->user->identity->rol === 10){?>

        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este tipo-Inmueble?',
                'method' => 'post',
            ],
        ]) ?>
        <?php }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Nombre',
        ],
    ]) ?>

</div>
