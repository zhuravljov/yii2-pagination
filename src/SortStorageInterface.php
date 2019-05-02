<?php
/**
 * @link https://github.com/zhuravljov/yii2-pagination
 * @copyright Copyright (c) 2017 Roman Zhuravlev
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace zhuravljov\yii\pagination;

/**
 * Sort Storage Interface
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
interface SortStorageInterface
{
    /**
     * @param StoredSort $sort
     * @return string|null
     */
    public function getSortField(StoredSort $sort);

    /**
     * @param StoredSort $sort
     * @param string $value
     */
    public function setSortField(StoredSort $sort, $value);
}
