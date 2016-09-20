<?php
use kartik\mpdf\Pdf;

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'pt-BR',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'GbRhTzgtNF4t0pALSUMqj8NIGZemZ005',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'pedidos' => 'pedido-produto',
                'pedido/novo' => 'pedido-produto/create',
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['api/produtos' => 'produto-rest'],
                    'except' => ['delete']],
            ],

        ],

        'formatter' => [
            'dateFormat' => 'dd/MM/yyyy',
            'datetimeFormat' => 'dd/MM/yyyy HH:mm',
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
            'currencyCode' => 'BRL',
            'defaultTimeZone' => 'America/Manaus',
        ],

        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'mode' => Pdf::MODE_UTF8
            // refer settings section for all configuration options
        ],
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    /*$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];*/

    $config['bootstrap'][] = 'gii';

    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*'],
        'generators' => [
            'myCrud' => [
                'class' => 'app\myTemplate\crud\Generator',
                'templates' => [
                    'my' => '@app/myTemplate/crud/default',
                ]
            ]
        ],
    ];
    /*$config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];*/
}

return $config;
