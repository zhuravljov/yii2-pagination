<?php
require(__DIR__ . '/../../vendor/autoload.php');

define('YII_ENV', 'dev');
define('YII_DEBUG', true);

require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../app/config/main.php');
$app = new yii\web\Application($config);
$app->run();
