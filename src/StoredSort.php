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
        $this->initStoredSort();
    }

    /**
     * Inits stored sort value.
     */
    protected function initStoredSort()
    {
        if (($requestedValue = $this->getRequestSortValue()) !== null) {
            if ($this->validateSortValue($requestedValue)) {
                $this->storage->setSortField($this, $requestedValue);
            } else {
                $this->storage->unsetSortField($this);
            }
        } elseif (($storedValue = $this->storage->getSortField($this)) !== null) {
            if ($this->validateSortValue($storedValue)) {
                $this->params[$this->sortParam] = $storedValue;
            } else {
                $this->storage->unsetSortField($this);
            }
        }
    }

    /**
     * @return mixed|null
     */
    private function getRequestSortValue()
    {
        $request = Yii::$app->get('request');
        if ($request instanceof Request) {
            return $request->getQueryParam($this->sortParam, null);
        }
        return null;
    }

    /**
     * @param string $value
     */
    private function validateSortValue($value)
    {
        if (!is_scalar($value)) {
            return false;
        }

        $value = trim($value);
        if ($value === '') {
            return false;
        }

        $names = explode($this->separator, $value);
        foreach ($names as $name) {
            if (strncmp($name, '-', 1) === 0) {
                $name = substr($name, 1);
            }
            if ($this->attributes && !isset($this->attributes[$name])) {
                return false;
            }
            if (!$this->enableMultiSort) {
                return true;
            }
        }
        return true;
    }
}
