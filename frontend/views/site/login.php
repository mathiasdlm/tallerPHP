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
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p> <?=Yii::t('app','login instructions')?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <?=Yii::t('app','forgotpss')?><?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app','Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
              
                    <?= Html::a('<img width="30px" src="http://www.myiconfinder.com/uploads/iconsets/128-128-22e6ab97ed7351a8934bd466db9a7eaa.png"/>', Url::to('fblogin'), ['class' => 'btn btn-primary', 'name' => 'login-button' , 'style'=>'padding:0;width:30px;']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
