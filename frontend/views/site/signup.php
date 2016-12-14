<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>


<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Registro</label>
        <input style="display:none !important;" id="tab-2" type="radio" name="tab" class="sign-up"><label style="display:none !important;" for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">

    <p><?=Yii::t('app','signup instructions')?></p>


            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group" style="float:right;">

                    <?= Html::submitButton(Yii::t('app','Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

                </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>
</div>

