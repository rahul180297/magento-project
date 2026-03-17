<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Test\GraphQl\Api\Data;

interface BlogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get blog list.
     * @return \Test\GraphQl\Api\Data\BlogInterface[]
     */
    public function getItems();

    /**
     * Set post list.
     * @param \Test\GraphQl\Api\Data\BlogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

