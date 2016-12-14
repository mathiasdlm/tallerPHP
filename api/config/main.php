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
        'oauth2' => [
            'class' => 'filsh\yii2\oauth2server\Module',
            'options' => [
                'token_param_name' => 'access_token',
                'access_lifetime' => 3600 * 24
            ],
            'storageMap' => [
                'user_credentials' => 'common\models\User'
            ],
            'grantTypes' => [
                'client_credentials' => [
                    'class' => 'OAuth2\GrantType\ClientCredentials',
                    'allow_public_clients' => false
                ],
                'user_credentials' => [
                    'class' => 'OAuth2\GrantType\UserCredentials'
                ],
                'refresh_token' => [
                    'class' => 'OAuth2\GrantType\RefreshToken',
                    'always_issue_new_refresh_token' => true
                ]
            ],
        ],
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [        
        'user' => [
            'identityClass' => 'common\models\User',
            'loginUrl' => null,
            'enableSession' => false,
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'format' => yii\web\Response::FORMAT_JSON,
            'on beforeSend' => function (\yii\base\Event $event) {
                /** @var \yii\web\Response $response */
                $response = $event->sender;
                // catch situation, when no controller hasn't been loaded
                // so no filter wasn't loaded too. Need to understand in which format return result
                if(empty(Yii::$app->controller)) {
                    $content_neg = new \yii\filters\ContentNegotiator();
                    $content_neg->response = $response;
                    $content_neg->formats = Yii::$app->params['formats'];
                    $content_neg->negotiate();
                }
                if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                }
            },
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
                'POST /oauth2/<action:\w+>' => 'oauth2/default/<action>',
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