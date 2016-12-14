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
    ],
    ['langs'=>["en", "es"]]
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'i18n' => [
            'translations' => [
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@app/messages'
                ],
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
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
    'on beforeAction' =>function($event){ 
        $ctrlName = Yii::$app->controller->id;//$event->action->controller->id;
        $action = Yii::$app->controller->action->id;//$event->action->controller->module->requestedRoute;
        $act = $event->action->controller->module->requestedAction;
        //var_dump(Yii::$app->request->acceptableLanguages);
        Yii::$app->language = Yii::$app->request->getPreferredLanguage(Yii::$app->params['langs']);
        if (Yii::$app->user->isGuest && $ctrlName != 'site' && $action != 'login') {     
            $event->action->controller->redirect("site/login");       
            
        }
    }
];
