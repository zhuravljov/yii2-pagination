<?php
/**
 * @var \yii\web\View $this
 * @var array $records
 */

use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

?>
<div class="test-stand">
    <div class="pull-right">
        <?= Html::a('Reset', ['index'], ['class' => 'btn btn-lg btn-default']) ?>
    </div>
    <h1>LinkPager and LinkSizer widgets</h1>
    <?= GridView::widget([
        'dataProvider' => new ArrayDataProvider([
            'key' => 'id',
            'allModels' => $records,
            'sort' => [
                'enableMultiSort' => false,
                'attributes' => [
                    'id',
                    'name',
                ],
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ],
            ],
        ]),
        'columns' => [
            'id',
            'name'
        ],
    ]) ?>
</div>
