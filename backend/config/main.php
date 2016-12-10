<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'on beforeRequest' =>function($event){ 
     //  var_dump(Yii::$app->request->headers);
    }, 
    'on beforeAction' =>function($event){ 
        $ctrlName = Yii::$app->controller->id;//$event->action->controller->id;
        $action = Yii::$app->controller->action->id;//$event->action->controller->module->requestedRoute;
        $act = $event->action->controller->module->requestedAction;
        //var_dump(Yii::$app->request->acceptableLanguages);
        Yii::$app->language = Yii::$app->request->getPreferredLanguage(["es-ES", "en-Us", "pr-Br"]);
        //var_dump(Yii::$app->user->isGuest);
        //var_dump($ctrlName != 'site');
        //var_dump($action != 'login');
        if (Yii::$app->user->isGuest && $ctrlName != 'site' && $action != 'login') {     
            $event->action->controller->redirect("site/login");       
        }
    },
    'components' => [
        'request' => [
            'cookieValidationKey' => 'ROMwfZsgvVJzNxogpAbK',
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\Admin',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ]
        
    ],
    'params' => $params,
];
