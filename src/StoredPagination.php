<?php
/**
 * @link https://github.com/zhuravljov/yii2-pagination
 * @copyright Copyright (c) 2017 Roman Zhuravlev
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace zhuravljov\yii\pagination;

use yii\base\InvalidConfigException;
use yii\data\Pagination;
use yii\di\Instance;

/**
 * Stored Pagination
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
class StoredPagination extends Pagination
{
    /**
     * @var PaginationStorageInterface|array|string
     */
    public $storage = SessionPaginationStorage::class;

    private $_issetSize;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!$this->forcePageParam) {
            throw new InvalidConfigException('Property $forcePageParam must be true.');
        }
        $this->storage = Instance::ensure($this->storage, PaginationStorageInterface::class);
    }

    /**
     * @inheritdoc
     */
    public function getPageSize()
    {
        if (!$this->_issetSize) {
            $this->_issetSize = true;
            if (!empty($this->pageSizeLimit)) {
                $storedPageSize = $this->storage->getPageSize($this);
                if (!$this->getQueryParam($this->pageParam)) {
                    $this->setPageSize(intval($storedPageSize) ?: $this->defaultPageSize, true);
                } elseif ($queryPageSize = (int) $this->getQueryParam($this->pageSizeParam)) {
                    $this->setPageSize($queryPageSize, true);
                    if ($queryPageSize !== $storedPageSize) {
                        $this->storage->setPageSize($this, $queryPageSize);
                    }
                } else {
                    $this->setPageSize($this->defaultPageSize, true);
                    if ($storedPageSize) {
                        $this->storage->unsetPageSize($this);
                    }
                }
            }
        }
        return parent::getPageSize();
    }
}
