<?php

use yii\helpers\Html; 

use yii\widgets\Pjax;
use common\models\TipoInmueble;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inmuebles';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmuebles-index">

    <div class="container-fluid">
        <div class="row">
             
            <div class="col-xs-12 col-sm-12"> 
            <?php Pjax::begin(['id'=>'pjax-job-gridview-rodro']) ?>
                    <?= GridView::widget([
                
                        'filterModel' => $model,
                        'dataProvider' => $provider,  
                        'emptyText' => 'No hay inmuebles para mostrar',  
                        'columns' => [
                            'nombre:ntext',
                            'cantDormitorios:ntext',
                            'metrosTotales:ntext',
                            'metrosEdificados:ntext',
                            'cantBanos:ntext',
                            [
                                'attribute' => 'patio',
                                'value' => function($model){
                                    return $model->patio === 1 ? Yii::t('app', 'yes'):Yii::t('app', 'no'); 
                                },
                                'filter'=>[1=>Yii::t('app', 'yes'),0=>Yii::t('app', 'no')],
                            ],[
                                'attribute' => 'cochera',
                                'value' => function($model){
                                    return $model->cochera === 1 ? Yii::t('app', 'yes'):Yii::t('app', 'no'); 
                                },
                                'filter'=>[1=>Yii::t('app', 'yes'),0=>Yii::t('app', 'no')],
                            ],
                            [
                                'attribute' => 'tipo',
                                'value' => 'tipoFiltro.Nombre',
                                'filter'=>ArrayHelper::map(TipoInmueble::find()->asArray()->all(), 'id', 'Nombre'),
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view}',
                            ]
                        ]
                    ]); 
                ?>  
                <? Pjax::end() ?>   
            </div>
        </div>
    </div>
</div>