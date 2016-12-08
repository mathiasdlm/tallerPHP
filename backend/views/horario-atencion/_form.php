<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Cliente;
use backend\models\Inmueble;


/* @var $this yii\web\View */
/* @var $model app\models\HorarioAtencion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="horario-atencion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'horaDesde')->textInput() ?>

    <?= $form->field($model, 'horaHasta')->textInput() ?>

    <?=$form->field($model, 'idCliente')->dropDownList(
        
        ArrayHelper::map(Cliente::find()->all(),'id','nombre'),['prompt'=>'Seleccione un Cliente']); ?>

     <?= $form->field($model, 'idInmueble')->dropDownList(  

        ArrayHelper::map(Inmueble::find()->all(),'id','nombre'),['prompt'=>'Seleccione un Inmueble']); ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Alta Horario' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
