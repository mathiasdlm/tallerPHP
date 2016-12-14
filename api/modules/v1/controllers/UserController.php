<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use common\models\Favoritos;
use Yii;

class UserController extends ActiveController
{
	use \api\traits\ControllersCommonTrait;
    public $modelClass = 'common\models\User';

    public function actionListarfavorito(){
    	return Favoritos::find()->where(['idUser' => Yii::$app->user->id])->all();
	}
    
    public function actionAltafavorito(){
    	if (Favoritos::findOne(['idInmueble' => Yii::$app->request->post('idInmueble'), 'idUser' => Yii::$app->user->id]) !== null){
			throw new \yii\web\HttpException(500, 'Ya existe favorito');
		}
    	try{

	    	$model = new Favoritos;
	       	$model->idUser  =  Yii::$app->user->id;
	       	$model->idInmueble  =  Yii::$app->request->post('idInmueble');
	       	$model->save(false);
	       	return Favoritos::findOne(['idInmueble' => Yii::$app->request->post('idInmueble'), 'idUser' => Yii::$app->user->id]);
        }catch(\Exception $e){
        	throw new \yii\web\HttpException(500, 'Usuario o Inmueble inexistentes');
        }
	}
	public function actionBorrarfavorito($id){
		if (Favoritos::findOne(['idInmueble' => $id, 'idUser' => Yii::$app->user->id]) !== null){
    		Favoritos::findOne(['idInmueble' => $id, 'idUser' => Yii::$app->user->id])->delete();
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