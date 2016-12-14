<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use common\models\Inmueble;

class InmuebleController extends ActiveController
{
    use \api\traits\ControllersCommonTrait;
    public $modelClass = 'common\models\Inmueble';

    public function actionSearch($id, $nombre, $cantDormitorios, $cantBanos, $metrosTotales, $metrosEdificados, $cochera, $patio){
    	$query = [];
    	if($id != NULL)
			$query['id'] = $id;
		if($nombre != NULL)
    		$query['nombre'] = $nombre;
    	if($cantDormitorios != NULL)
    		$cantBanos['cantDormitorios'] = $cantDormitorios;
    	if($nombre != NULL)
    		$query['cantBanos'] = $cantBanos;
    	if($metrosTotales != NULL)
    		$query['metrosTotales'] = $metrosTotales;
    	if($metrosEdificados != NULL)
    		$query['metrosEdificados'] = $metrosEdificados;
    	if($cochera != NULL)
    		$query['cochera'] = $cochera;
    	if($patio != NULL)
    		$query['patio'] = $patio;
	    return Inmueble::find()->where($query)->all();
	}

    public function accessRules()
    {
        return [
            [
                'allow' => true,
                'roles' => ['@'],
            ],
            [
                'allow' => true,
                'actions' => [
                    'view',
                    'create',
                    'update',
                    'delete'
                ],
                'roles' => ['@'],
            ],
        ];
    }
}

?>