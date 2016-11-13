<?php
return [
	'modules'    => [
        'utility' => [
            'class' => 'c006\utility\migration\Module',
        ],
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
