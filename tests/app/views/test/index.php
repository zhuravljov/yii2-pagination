<?php
/**
 * @var \yii\web\View $this
 * @var array $records
 */

use yii\data\ArrayDataProvider;
use yii\grid\GridView;

?>
<div class="test-index">
    <h1>test/index</h1>
    <?= GridView::widget([
        'dataProvider' => new ArrayDataProvider([
            'key' => 'id',
            'allModels' => $records,
        ]),
    ]) ?>
</div>