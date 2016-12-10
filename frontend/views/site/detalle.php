<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Informacion Inmueble';
//$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmueble-view">

  <!--  <h1><?= Html::encode($this->title) ?></h1>-->
    <?php Pjax::begin(['id'=>'pjax-job-gridview-rodro']) ?>
        <p>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </p>
    <?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'cantDormitorios',
            'cantBanos',
            'metrosEdificados',
            'metrosTotales',
            'cochera',
            'patio',
        ],
    ]) ?>

</div>