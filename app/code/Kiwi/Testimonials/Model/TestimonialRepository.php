<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Model;

use Kiwi\Testimonials\Api\TestimonialRepositoryInterface;
use Kiwi\Testimonials\Api\Data\TestimonialInterface;
use Kiwi\Testimonials\Model\ResourceModel\Testimonial as TestimonialResource;
use Kiwi\Testimonials\Model\TestimonialFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Kiwi\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

/**
 * Testimonial repository implementation
 */
class TestimonialRepository implements TestimonialRepositoryInterface
{
    /**
     * Resource model
     *
     * @var TestimonialResource
     */
    private TestimonialResource $resource;

    /**
     * Testimonial factory
     *
     * @var TestimonialFactory
     */
    private TestimonialFactory $testimonialFactory;

    private CollectionFactory $collectionFactory;
    private SearchResultsInterfaceFactory $searchResultsFactory;
    private CollectionProcessorInterface $collectionProcessor;


    /**
     * @param TestimonialResource $resource
     * @param TestimonialFactory $testimonialFactory
     */
    public function __construct(
        TestimonialResource $resource,
        TestimonialFactory $testimonialFactory,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->testimonialFactory = $testimonialFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function getList(
        SearchCriteriaInterface $searchCriteria
    ): SearchResultsInterface {

        $collection = $this->collectionFactory->create();

        // Apply filters, sorting, pagination
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Save testimonial
     *
     * @param TestimonialInterface $testimonial
     * @return TestimonialInterface
     * @throws CouldNotSaveException
     */
    public function save(TestimonialInterface $testimonial): TestimonialInterface
    {
        try {
            $this->resource->save($testimonial);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(
                __('Could not save the testimonial.'),
                $e
            );
        }

        return $testimonial;
    }

    /**
     * Get testimonial by ID
     *
     * @param int $id
     * @return TestimonialInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): TestimonialInterface
    {
        $testimonial = $this->testimonialFactory->create();
        $this->resource->load($testimonial, $id);

        if (!$testimonial->getId()) {
            throw new NoSuchEntityException(__('Testimonial not found.'));
        }

        return $testimonial;
    }

    /**
     * Delete testimonial
     *
     * @param TestimonialInterface $testimonial
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(TestimonialInterface $testimonial): bool
    {
        try {
            $this->resource->delete($testimonial);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(
                __('Could not delete the testimonial.'),
                $e
            );
        }

        return true;
    }

    /**
     * Delete testimonial by ID
     *
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool
    {
        return $this->delete($this->getById($id));
    }
}
