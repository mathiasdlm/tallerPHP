<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

class InmuebleController extends ActiveController
{
    public $modelClass = 'common\models\Inmueble';

    function conFiltros(){
    	alert(1);
    }
}

?>