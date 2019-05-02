<?php

namespace tests\app\controllers;

use Yii;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        return $this->redirect(['stand']);
    }

    public function actionStand()
    {
        return $this->render('stand', [
            'records' => array_map(function ($value) {
                return [
                    'id' => $value,
                    'name' => Yii::$app->formatter->asSpellout($value),
                ];
            }, range(1, 120))
        ]);
    }
}
