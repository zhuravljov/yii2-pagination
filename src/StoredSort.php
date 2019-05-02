<?php
/**
 * @link https://github.com/zhuravljov/yii2-pagination
 * @copyright Copyright (c) 2017 Roman Zhuravlev
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace zhuravljov\yii\pagination;

use Yii;
use yii\data\Sort;
use yii\di\Instance;
use yii\web\Request;

/**
 * Stored Sort
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
class StoredSort extends Sort
{
    /**
     * @var SortStorageInterface|array|string
     */
    public $storage = SessionSortStorage::class;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->storage = Instance::ensure($this->storage, SortStorageInterface::class);

        if (is_string($sortValue = $this->getRequestSortValue())) {
            $this->storage->setSortField($this, $sortValue);
        } elseif (is_string($sortValue = $this->storage->getSortField($this))) {
            $this->params[$this->sortParam] = $sortValue;
        }
    }

    /**
     * @return string|null
     */
    private function getRequestSortValue()
    {
        $request = Yii::$app->get('request');
        if ($request instanceof Request) {
            return $request->getQueryParam($this->sortParam, null);
        }
        return null;
    }
}
