<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HorarioAtencion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="horario-atencion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'horaDesde')->textInput() ?>

    <?= $form->field($model, 'horaHasta')->textInput() ?>

    <?= $form->field($model, 'idCliente')->textInput() ?>

    <?= $form->field($model, 'idInmueble')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Alta Horario' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
