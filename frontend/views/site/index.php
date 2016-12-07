<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

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
                                    <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Price
                                </a>
                            </h4>
                        </div>
                        <div id="collapse0" class="panel-collapse collapse in" >
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            0 - 1000$
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox" >
                                        <label>
                                            <input type="checkbox" value="">
                                            1000$ - 2000$
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox"  >
                                        <label>
                                            <input type="checkbox" value="">
                                            2000$ - 6000$
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox"  >
                                        <label>
                                            <input type="checkbox" value="">
                                            More Than 6000$
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1">
                                    <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Brand
                                </a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in" >
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            citroen
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox" >
                                        <label>
                                            <input type="checkbox" value="">
                                            benz
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox"  >
                                        <label>
                                            <input type="checkbox" value="">
                                            bmw
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-heading" >
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse3"><i class="indicator fa fa-caret-down" aria-hidden="true"></i> Color</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse in">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            red
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox" >
                                        <label>
                                            <input type="checkbox" value="">
                                            blue
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox"  >
                                        <label>
                                            <input type="checkbox" value="">
                                            green
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
                <div class="row">
                    <?php for ($i = 1; $i <= 10; $i++) {?>
                        <div class="col-xs-6 col-lg-4">
                            <h2>Heading</h2>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                            <p>
                                <a class="btn btn-default btn-primary" href="#" role="button">
                                    Detalle
                                </a>
                                <a class="btn btn-default pull-right" href="#" role="button">
                                    <i class="glyphicon glyphicon-star"></i>
                                </a>
                            </p>
                        </div><!--/.col-xs-6.col-lg-4-->
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
