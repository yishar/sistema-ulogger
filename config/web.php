<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '754DdJrNpRX5uoImM5oIk0OyhadmVYJP',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],*/
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com', // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => 'anthonycaicedo8@gmail.com',
                'password' => 'anthonycc95',
                'port' => '587', // Port 25 is a very common port too
                'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        /* Añadido para el tema*/
        /*'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
             ],
         ],
    ],*/
        
    'authClientCollection' => [
    'class' => yii\authclient\Collection::className(),
    'clients' => [
        'facebook' => [
            'class'        => 'dektrium\user\clients\Facebook',
            'clientId'     => '1026303030863310',
            'clientSecret' => '0b392ba3518437cda67632dfcec23ae8',
        ],
//        'twitter' => [
//            'class'          => 'dektrium\user\clients\Twitter',
//            'consumerKey'    => 'CONSUMER_KEY',
//            'consumerSecret' => 'CONSUMER_SECRET',
//        ],
        'google' => [
            'class'        => 'dektrium\user\clients\Google',
            'clientId'     => '826278816988-qofi7pt1db690rghok0ac6uov1queq7u.apps.googleusercontent.com',
            'clientSecret' => 'lMS2RNtXAOUdDdlL0aIO7Wgq',
        ],
    ],
],

    ],
    //Añadido para el user
    'modules' => [
            'user' => [
                'class' => 'dektrium\user\Module',
                'enableUnconfirmedLogin' => false,
                'confirmWithin' => 21600,
                'cost' => 12,
                'admins' => ['admin', 'superadmin']
            ],
    //Añadido para el rbac
            'rbac' => 'dektrium\rbac\RbacWebModule',
            //Administrador de carpetas
           /* 'roxymce' => [ 
                'class' => 'navatech\roxymce\Module', 
                'uploadFolder' => '@frontend/web/uploads/images', 
            ],*/
        ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}


return $config;
