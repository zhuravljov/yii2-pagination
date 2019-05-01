<?php
/**
 * @link https://github.com/zhuravljov/yii2-pagination
 * @copyright Copyright (c) 2017 Roman Zhuravlev
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace zhuravljov\yii\pagination;

/**
 * Pagination Storage Interface
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
interface PaginationStorageInterface
{
    /**
     * @param StoredPagination $pagination
     * @return int|null
     */
    public function getPageSize(StoredPagination $pagination);

    /**
     * @param StoredPagination $pagination
     * @param int $value
     */
    public function setPageSize(StoredPagination $pagination, $value);

    /**
     * @param StoredPagination $pagination
     */
    public function unsetPageSize(StoredPagination $pagination);
}
