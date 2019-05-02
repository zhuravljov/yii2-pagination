<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
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
    'bootstrap' => [
        'debug',
    ],
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
    'modules' => [
        'debug' => [
            'class' => \yii\debug\Module::class,
            'allowedIPs' => ['*'],
        ],
    ],
    'container' => [
        'definitions' => [
            \yii\widgets\LinkPager::class => \zhuravljov\yii\pagination\LinkPager::class,
            \zhuravljov\yii\pagination\LinkPager::class => [
                'maxButtonCount' => 5,
            ],
            \zhuravljov\yii\pagination\LinkSizer::class => [
                'sizes' => [5, 10, 20, 50, 100],
            ],
            \yii\data\Pagination::class => \zhuravljov\yii\pagination\StoredPagination::class,
            \zhuravljov\yii\pagination\StoredPagination::class => [
                'storage' => \zhuravljov\yii\pagination\SessionPaginationStorage::class,
                'defaultPageSize' => 10,
                'pageSizeLimit' => [1, 100],
                'pageSizeParam' => 'size',
            ],
            \yii\data\Sort::class => \zhuravljov\yii\pagination\StoredSort::class,
            \zhuravljov\yii\pagination\StoredSort::class => [
                'storage' => \zhuravljov\yii\pagination\SessionSortStorage::class,
                'sortParam' => 'sort',
            ],
        ],
    ],
];
