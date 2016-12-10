<?php

namespace backend\controllers;

use Yii;  
use yii\web\Controller;  

/**
 * BaseController
 */
class BaseController extends Controller
{
	 public function beforeAction($event)
    {
        if(Yii::$app == null || Yii::$app->user->isGuest){
            return false;
        }
        return true;
    }
}

?>