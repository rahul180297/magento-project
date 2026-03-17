<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Block;

use Magento\Framework\View\Element\Template;
use Kiwi\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Testimonials frontend block
 */
class Testimonials extends Template
{
    /**
     * Testimonial collection factory
     *
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    /**
     * Store manager for image
     *
     * @var StoreManagerInterface
     */
    protected StoreManagerInterface $storeManager;

    /**
     * @param Template\Context $context
     * @param CollectionFactory $collectionFactory
     * @param StoreManagerInterface $storeManager
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
        $this->storeManager = $storeManager;
    }

    /**
     * Get enabled testimonials collection
     *
     * @return \Kiwi\Testimonials\Model\ResourceModel\Testimonial\Collection
     */
    public function getTestimonials()
    {
        return $this->collectionFactory->create()
            ->addFieldToFilter('status', 1)
            ->setOrder('created_at', 'DESC');
    }

    /**
     * Get media base URL
     *
     * @return string
     */
    public function getMediaUrl(): string
    {
        return $this->storeManager->getStore()->getBaseUrl(
            \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
        );
    }
}
