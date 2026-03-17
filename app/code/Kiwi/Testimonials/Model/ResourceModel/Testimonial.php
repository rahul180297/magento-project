<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Testimonial resource model
 */
class Testimonial extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('kiwi_testimonials', 'id');
    }
}
