<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Test\GraphQl\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface BlogRepositoryInterface
{

    /**
     * Save blog
     * @param \Test\GraphQl\Api\Data\BlogInterface $blog
     * @return \Test\GraphQl\Api\Data\BlogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Test\GraphQl\Api\Data\BlogInterface $blog
    );

    /**
     * Retrieve blog
     * @param string $blogId
     * @return \Test\GraphQl\Api\Data\BlogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($blogId);

    /**
     * Retrieve blog matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Test\GraphQl\Api\Data\BlogSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete blog
     * @param \Test\GraphQl\Api\Data\BlogInterface $blog
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Test\GraphQl\Api\Data\BlogInterface $blog
    );

    /**
     * Delete blog by ID
     * @param string $blogId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($blogId);
}

