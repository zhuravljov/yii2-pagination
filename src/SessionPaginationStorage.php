<?php
/**
 * @link https://github.com/zhuravljov/yii2-pagination
 * @copyright Copyright (c) 2017 Roman Zhuravlev
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace zhuravljov\yii\pagination;

use Yii;
use yii\base\BaseObject;
use yii\di\Instance;
use yii\web\Session;

/**
 * Session Pagination Storage
 */
final class SessionPaginationStorage extends BaseObject implements PaginationStorageInterface
{
    /**
     * @var Session|array|string
     */
    public $session = 'session';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->session = Instance::ensure($this->session, Session::class);
    }

    /**
     * @inheritdoc
     */
    public function getPageSize(StoredPagination $pagination)
    {
        return $this->session->get($this->getKey($pagination));
    }

    /**
     * @inheritdoc
     */
    public function setPageSize(StoredPagination $pagination, $value)
    {
        $this->session->set($this->getKey($pagination), $value);
    }

    /**
     * @inheritdoc
     */
    public function unsetPageSize(StoredPagination $pagination)
    {
        $this->session->remove($this->getKey($pagination));
    }

    /**
     * @param StoredPagination $pagination
     * @return string
     */
    protected function getKey(StoredPagination $pagination)
    {
        return Yii::$app->requestedRoute . ':' . $pagination->pageSizeParam;
    }
}
