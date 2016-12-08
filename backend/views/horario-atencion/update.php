<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HorarioAtencion */

$this->title = 'Actualizar Horario Atencion: ';
//$this->params['breadcrumbs'][] = ['label' => 'Horario Atencions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="horario-atencion-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
