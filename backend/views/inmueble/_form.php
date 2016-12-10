<?php
namespace backend\models;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Cliente;
use backend\models\TipoInmueble;


/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmueble-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'lon')->textInput() ?>

    <?= $form->field($model, 'cantDormitorios')->textInput() ?>

    <?= $form->field($model, 'cantBanos')->textInput() ?>

    <?= $form->field($model, 'metrosTotales')->textInput() ?>

    <?= $form->field($model, 'metrosEdificados')->textInput() ?>

    <?= $form->field($model, 'cochera')->checkboxList([0 => ' No ', 1 => ' Si']) ?>

    <?= $form->field($model, 'patio')->checkboxList([0 => ' No ', 1 => ' Si']) ?>

    <?= $form->field($model, 'idTipo')->dropDownList(  

        ArrayHelper::map(TipoInmueble::find()->all(),'id','Nombre'),['prompt'=>'Seleccione un Tipo']); ?>
    
    <?=$form->field($model, 'idCliente')->dropDownList(
        
        ArrayHelper::map(Cliente::find()->all(),'id','nombre'),['prompt'=>'Seleccione un Cliente']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Alta Inmueble' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
