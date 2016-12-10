<?php

use yii\helpers\Html;
use yii\widgets\ListView;

use backend\models\TipoInmueble;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inmuebles';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmuebles-index">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4 col-sm-4">
                <div id="accordion" class="panel panel-primary behclick-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Filtros de busqueda</h3>
                    </div>
                    <div class="panel-body" >
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse0">
                                    Tipo de inmueble
                                </a>
                            </h4>
                        </div>
                        <div id="collapse0" class="panel-collapse collapse in" >
                            <ul class="list-group">
                                <?php foreach (TipoInmueble::find()->all() as $tipo) {?>
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="<?= $tipo->id ?>">
                                            <?= $tipo->Nombre ?> 
                                        </label>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1">
                                    Dormitorios
                                </a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in" >
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1"> 1
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox" >
                                        <label>
                                            <input type="checkbox" value="2"> 2
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="3"> m&aacute;s de 2
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-default btn-success" href="#" role="button">
                            Buscar
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-8 col-sm-8"> 
                 <?= ListView::widget([
                        'dataProvider' => $provider,
                        'itemOptions' => ['class' => 'row'],
                        'emptyText' => 'No hay inmuebles para mostrar',
                        'itemView' => '_inmueble_card'
                ]) ?>   
            </div>
        </div>
    </div>
</div>