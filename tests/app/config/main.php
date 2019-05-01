<?php
return [
    'id' => 'yii2-pagination-app',
    'basePath' => dirname(__DIR__),
    'runtimePath' => dirname(dirname(__DIR__)) . '/runtime',
    'vendorPath' => dirname(dirname(dirname(__DIR__))) . '/vendor',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerNamespace' => 'tests\app\controllers',
    'defaultRoute' => 'test',
    'viewPath' => dirname(__DIR__) . '/views',
    'components' => [
        'request' => [
            'class' => \yii\web\Request::class,
            'cookieValidationKey' => '1234567890',
        ],
        'urlManager' => [
            'class' => \yii\web\UrlManager::class,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];
