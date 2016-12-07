<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Favoritos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="favoritos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idInmueble')->textInput() ?>

    <?= $form->field($model, 'idUser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
