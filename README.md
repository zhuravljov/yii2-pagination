Yii2 Pagination Widgets
=======================

[![Latest Stable Version](https://poser.pugx.org/zhuravljov/yii2-pagination/v/stable.svg)](https://packagist.org/packages/zhuravljov/yii2-pagination)
[![Total Downloads](https://poser.pugx.org/zhuravljov/yii2-pagination/downloads.svg)](https://packagist.org/packages/zhuravljov/yii2-pagination)

Installation
------------

The preferred way to install the extension is through [composer](http://getcomposer.org/download/).
Add to the require section of your `composer.json` file:

```
"zhuravljov/yii2-paginations": "~1.0"
```

Usage
-----

Way to add PageSizer widget to each GridView and ListView of an application
using DI container definition:

```php
<?php
return [
    'container' => [
        'definitions' => [
            \yii\widgets\LinkPager::class => \zhuravljov\yii\pagination\LinkPager::class,
        ],
    ],
];
```

Advanced container configuration of LinkPager and LinkSizer widgets:

```php
<?php
return [
    'container' => [
        'definitions' => [
            \yii\widgets\LinkPager::class => \zhuravljov\yii\pagination\LinkPager::class,
            \zhuravljov\yii\pagination\LinkPager::class => [
                'maxButtonCount' => 5,
            ],
            \zhuravljov\yii\pagination\LinkSizer::class => [
                'sizes' => [5, 10, 20, 50, 100],
            ],
            \yii\data\Pagination::class => [
                'defaultPageSize' => 10,
                'pageSizeLimit' => [1, 100],
            ],
        ],
    ],
];
```
