<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use common\models\Favoritos;
use Yii;

class UserController extends ActiveController
{
	use \api\traits\ControllersCommonTrait;
    public $modelClass = 'common\models\User';

    public function actionListarfavorito($id){
    	return Favoritos::find()->where(['idUser' => $id])->all();
	}
    
    public function actionAltafavorito($id){
    	
    	try{
	    	$model = new Favoritos;
	       	$model->idUser  =  $id;
	       	$model->idInmueble  =  Yii::$app->request->post('idInmueble');
	       	$model->save(false);
        }catch(\Exception $e){
        	throw new \yii\web\HttpException(500, 'Usuario o Inmueble inexistentes');
        }
	}
	public function actionBorrarfavorito($id){
		if (Favoritos::findOne(['idInmueble' => Yii::$app->request->post('idInmueble'), 'idUser' => $id]) !== null){
    		Favoritos::findOne(['idInmueble' => Yii::$app->request->post('idInmueble'), 'idUser' => $id])->delete();
		}else{
			throw new \yii\web\HttpException(500, 'No existe favorito con los datos ingresados');
		}
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