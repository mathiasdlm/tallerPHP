<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="col-xs-6 col-lg-4">
    <h2> <?= $model->nombre?></h2>
        <p> <span><?=HTML::activeLabel($model, 'cantDormitorios')?>:&nbsp;</span><?= $model->cantDormitorios?></p>
        <p> <span><?=HTML::activeLabel($model, 'cantBanos')?> :&nbsp;</span><?= $model->cantBanos?></p>
        <p> <span><?=HTML::activeLabel($model, 'metrosEdificados')?>:&nbsp;</span><?= $model->metrosEdificados?></p>
        <p> <span><?=HTML::activeLabel($model, 'metrosTotales')?>:&nbsp;</span><?= $model->metrosTotales?></p>
        <p> <span><?=HTML::activeLabel($model, 'cochera')?>:&nbsp;</span><?= $model->cochera?></p>
        <p> <span><?=HTML::activeLabel($model, 'patio')?>:&nbsp;</span><?= $model->patio?></p>
        <p>
            <?= Html::a('Detalle', Url::to(['detalle', 'id' => $model->id]),['class'=>'btn btn-default btn-primary'])?>
            <a class="btn btn-default pull-right" href="#" role="button">
                <i class="glyphicon glyphicon-star"></i>
            </a>
        </p>
    </div>
</div>