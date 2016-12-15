<?php

use yii\helpers\Html;
use yii\grid\GridView;

use common\models\Cliente;
use common\models\TipoInmueble; 
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inmuebles';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmueble-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
<?php if(Yii::$app->user->identity->rol === 10 || Yii::$app->user->identity->rol === 20){?>
    <p>
        <?= Html::a('Alta Inmueble', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php }?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'cantBanos',
            'cantDormitorios',   
            'cochera'=>[
            'attribute' => 'Cochera',
            'value'=> function ($model) {
                if($model->cochera === 1){
                    return 'Si';
                }else{
                    return 'No';
                }
              },
            ],
            'patio'=>[
            'attribute' => 'Patio',
            'value'=> function ($model) {
                if($model->patio === 1){
                    return 'Si';
                }else{
                    return 'No';
                }
              },
            ],
            [
                'attribute' => 'Tipo',
                'value' => function ($model) {
                    return $model->getTipo()->one()->Nombre;
                  },
            ],
            [
                'attribute' => 'Cliente',
                'value' => function ($model) {
                    return $model->getCliente()->one()->nombre;
                  },
            ],
            // 'idCliente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
