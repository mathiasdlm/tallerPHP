<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'INDEX';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <p>
        <?= Html::a('Alta Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
