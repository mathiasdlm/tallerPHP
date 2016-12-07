<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Favoritos */

$this->title = 'Update Favoritos: ' . $model->idInmueble;
$this->params['breadcrumbs'][] = ['label' => 'Favoritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idInmueble, 'url' => ['view', 'idInmueble' => $model->idInmueble, 'idUser' => $model->idUser]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="favoritos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
