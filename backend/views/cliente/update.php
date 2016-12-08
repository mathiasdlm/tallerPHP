<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Actualizar Cliente: ';
//$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cliente-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
