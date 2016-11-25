<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmueble-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coordenadas')->textInput() ?>

    <?= $form->field($model, 'cantDormitorios')->textInput() ?>

    <?= $form->field($model, 'cantBanos')->textInput() ?>

    <?= $form->field($model, 'metrosTotales')->textInput() ?>

    <?= $form->field($model, 'metrosEdificados')->textInput() ?>

    <?= $form->field($model, 'cochera')->textInput() ?>

    <?= $form->field($model, 'patio')->textInput() ?>

    <?= $form->field($model, 'idTipo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
