<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php'),[
        'FB_APP_ID'=> '1192158787516310', 
        'FB_SECRET_KEY' => '6423271b116175ef432b060631f5003c',
        'FB_API_KEY' => '<api key>',
        //4e83247207898958ba0f109feef6e315
        // url of user-controller / handshake action. including your domain etc. full valid url.
        'FB_HANDSHAKE_URL' => "http://localhost:8089/frontend/web/site/fbhandshake"
    ]
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'on beforeAction' =>function($event){ 
        $ctrlName = Yii::$app->controller->id;//$event->action->controller->id;
        $action = Yii::$app->controller->action->id;//$event->action->controller->module->requestedRoute;
        $act = $event->action->controller->module->requestedAction;
        //var_dump(Yii::$app->request->acceptableLanguages);
        Yii::$app->language = Yii::$app->request->getPreferredLanguage(["es-ES", "en-Us", "pr-Br"]);
        if (Yii::$app->user->isGuest && $ctrlName != 'site' && $action != 'login') {     
            $event->action->controller->redirect("site/login");       
            
        }
    },
    'components' => [
        'request' => [
            'cookieValidationKey' => 'FsDjiRPZDvObaEbFrUcl',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
