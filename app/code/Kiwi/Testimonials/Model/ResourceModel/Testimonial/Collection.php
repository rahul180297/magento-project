<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Model\ResourceModel\Testimonial;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Kiwi\Testimonials\Model\Testimonial as TestimonialModel;
use Kiwi\Testimonials\Model\ResourceModel\Testimonial as TestimonialResource;

/**
 * Testimonial collection
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize testimonial collection
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(
            TestimonialModel::class,
            TestimonialResource::class
        );
    }
}
