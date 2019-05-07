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
 * Session Sort Storage
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
final class SessionSortStorage extends BaseObject implements SortStorageInterface
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
    public function getSortField(StoredSort $sort)
    {
        return $this->session->get($this->getKey($sort), null);
    }

    /**
     * @inheritdoc
     */
    public function setSortField(StoredSort $sort, $value)
    {
        $this->session->set($this->getKey($sort), $value);
    }

    /**
     * @inheritdoc
     */
    public function unsetSortField(StoredSort $sort)
    {
        $this->session->remove($this->getKey($sort));
    }

    /**
     * @param StoredSort $sort
     * @return string
     */
    protected function getKey(StoredSort $sort)
    {
        return Yii::$app->requestedRoute . ':' . $sort->sortParam;
    }
}
