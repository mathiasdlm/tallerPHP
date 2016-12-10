<?php

use yii\helpers\Html; 

use yii\widgets\Pjax;
use backend\models\TipoInmueble;  
use yii\widgets\ActiveForm; 
                   use yii\grid\GridView;
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
                        ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            'nombre:ntext',
                            'cantDormitorios:ntext',
                            'metrosTotales:ntext',
                            'metrosEdificados:ntext',
                            'cantBanos:ntext',
                            'cochera:ntext',
                            'patio:ntext',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}',
                        ],
                        ]
                    ]); 
                ?>  
                <? Pjax::end() ?>   
            </div>
        </div>
    </div>
</div>