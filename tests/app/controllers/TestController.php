<?php

namespace tests\app\controllers;

use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'records' => array_map(function ($value) {
                return [
                    'id' => $value,
                    'name' => "Record $value",
                ];
            }, range(1001, 1111))
        ]);
    }
}
