<?php

namespace tests\app;

use yii\web\AssetBundle;
use yii\web\YiiAsset;

class AppAsset extends AssetBundle
{
    public $css = [
        'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css',
        'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css',
    ];
    public $js = [
        'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js',
    ];
    public $depends = [
        YiiAsset::class,
    ];
}
