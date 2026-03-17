<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Api;

use Kiwi\Testimonials\Api\Data\TestimonialInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

/**
 * Testimonial repository interface
 */
interface TestimonialRepositoryInterface
{
    /**
     * Save testimonial
     *
     * @param TestimonialInterface $testimonial
     * @return TestimonialInterface
     * @throws LocalizedException
     */
    public function save(TestimonialInterface $testimonial): TestimonialInterface;

    /**
     * Get testimonial by ID
     *
     * @param int $id
     * @return TestimonialInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): TestimonialInterface;

    /**
     * Delete testimonial
     *
     * @param TestimonialInterface $testimonial
     * @return bool
     * @throws LocalizedException
     */
    public function delete(TestimonialInterface $testimonial): bool;

    /**
     * Delete testimonial by ID
     *
     * @param int $id
     * @return bool
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById(int $id): bool;

    /**
     * Get testimonial list
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface;

}
