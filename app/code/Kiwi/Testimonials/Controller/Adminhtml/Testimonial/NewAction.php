<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\ForwardFactory;

/**
 * New testimonial action
 *
 * Forwards request to edit action
 */
class NewAction extends Action
{
    /**
     * Authorization level
     */
    public const ADMIN_RESOURCE = 'Kiwi_Testimonials::create';

    /**
     * Result forward factory
     *
     * @var ForwardFactory
     */
    protected ForwardFactory $resultForwardFactory;

    /**
     * @param Action\Context $context
     * @param ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Action\Context $context,
        ForwardFactory $resultForwardFactory
    ) {
        parent::__construct($context);
        $this->resultForwardFactory = $resultForwardFactory;
    }

    /**
     * Forward request to edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->resultForwardFactory
            ->create()
            ->forward('edit');
    }
}
