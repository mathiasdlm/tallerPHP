<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

class AdminController extends ActiveController
{
	use \api\traits\ControllersCommonTrait;
    public $modelClass = 'common\models\Admin';

    public function accessRules()
    {
        return [
            [
                'allow' => false,
                'roles' => ['?'],
            ],
            [
                'allow' => false,
                'actions' => [
                    'view',
                    'create',
                    'update',
                    'delete'
                ],
                'roles' => ['?'],
            ],
            /*[
                'allow' => true,
                'actions' => ['custom'],
                'roles' => ['@'],
                'scopes' => ['custom'],
            ],
            [
                'allow' => true,
                'actions' => ['protected'],
                'roles' => ['@'],
                'scopes' => ['protected'],
            ]*/
        ];
    }
}

?>