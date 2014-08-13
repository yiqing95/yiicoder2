<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@nineinchnick/usr' => '@vendor/nineinchnick/yii2-usr',
        '@year' => '@app/year',
    ],
    'bootstrap' => [
        'log',
        'year\status\Bootstrap',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
            'cookieValidationKey' => 'xxxxxxx',
        ],
        // 'user' => [  ],
        // user authentication component
        'user' => [
            'class' => 'year\user\components\WebUser',
            // other component settings
            'identityClass' => 'year\user\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
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

        'view' => [
            'theme' => [
                'class' => 'year\base\Theme',
                'name' => 'bootstrap',
                'basePath' => '@app/themes/bootstrap',
                // this will be used for assets(js css images) file
                'baseUrl' => '@web/themes/bootstrap',
                /*
                'pathMap' => [
                    '@app/views' => '@app/themes/basic',
                    '@app/modules' => '@app/themes/basic/modules', // <-- !!!
                ],
                */
            ],
        ],
    ],
    'params' => $params,

    'modules' => [
        'cassa' => [
            'class' => 'app\modules\cassa\Module',
        ],
        'test' => [
            'class' => 'app\modules\test\Module',
        ],
        'arango' => [

            'class' => 'app\modules\arango\Module',

        ],
        'usr' => array(
            'class' => 'nineinchnick\usr\Module',
            // 'userIdentityClass' => 'UserIdentity',
        ),
        'user' => [
            // 'class' => 'communityii\user\Module',
            'class' => 'year\user\Module',
            // other module settings
        ],
        'status' => [

            'class' => 'year\status\Module',

        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
