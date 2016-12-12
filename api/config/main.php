<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),  
    'controllerNamespace' => 'api\controllers',  
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableSession' => false,
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'format' => yii\web\Response::FORMAT_JSON
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 
                 'controller' => 'v1/user', 
                 'pluralize'     => false,
                 'extraPatterns' => [
                    'GET {id}/favorito' => 'listarfavorito',
                    'POST {id}/favorito' => 'altafavorito',
                    'DELETE {id}/favorito' => 'borrarfavorito'
                 ] 
                ],
                ['class' => 'yii\rest\UrlRule', 
                 'controller' => 'v1/inmueble', 
                 'pluralize'     => false,
                 'extraPatterns' => [
                    'GET search' => 'search',
                 ] 
                ],
                ['class' => 'yii\rest\UrlRule', 
                 'controller' => 'v1/admin', 
                 'pluralize'     => false
                ]
            ],
        ]
    ],
    'params' => $params,
];