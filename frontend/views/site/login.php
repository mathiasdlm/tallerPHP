<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use   yii\helpers\Url;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<p> <?=Yii::t('app','login instructions')?></p>


<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>


<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">LOGIN</label>
        <input style="display:none !important;" id="tab-2" type="radio" name="tab" class="sign-up"><label style="display:none !important;" for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>


                <div class="form-group">
                    <?= Html::a('<img style="width:auto;" src="https://i.stack.imgur.com/Vk9SO.png"/>', Url::to('fblogin'), ['class' => 'btn btn-primary', 'name' => 'login-button' , 'style'=>'padding:0;']) ?>
                </div>


                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                   <?=Yii::t('app','forgotpss')?><?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group" style="float:right;">
                    <?= Html::submitButton(Yii::t('app','Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>
</div>










