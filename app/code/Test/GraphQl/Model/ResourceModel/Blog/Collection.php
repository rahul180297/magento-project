<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Test\GraphQl\Model\ResourceModel\Blog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'blog_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Test\GraphQl\Model\Blog::class,
            \Test\GraphQl\Model\ResourceModel\Blog::class
        );
    }
}

