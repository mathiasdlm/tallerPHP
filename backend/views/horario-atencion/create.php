<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HorarioAtencion */

$this->title = 'Alta Horario Atencion';
//$this->params['breadcrumbs'][] = ['label' => 'Horario Atencions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horario-atencion-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
