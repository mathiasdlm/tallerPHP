<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="container-fluid">
        <div class="row">
            <?php for ($i = 1; $i <= 10; $i++) {?>
                <div class="col-xs-4 col-lg-3">
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
