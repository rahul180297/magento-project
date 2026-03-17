<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Exception\LocalizedException;
use Kiwi\Testimonials\Api\TestimonialRepositoryInterface;

/**
 * Edit testimonial controller
 */
class Edit extends Action
{
    /**
     * Authorization level
     */
    public const ADMIN_RESOURCE = 'Kiwi_Testimonials::edit';

    /**
     * Result page factory
     *
     * @var PageFactory
     */
    private PageFactory $resultPageFactory;

    /**
     * Testimonial repository
     *
     * @var TestimonialRepositoryInterface
     */
    private TestimonialRepositoryInterface $testimonialRepository;

    /**
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     * @param TestimonialRepositoryInterface $testimonialRepository
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        TestimonialRepositoryInterface $testimonialRepository
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->testimonialRepository = $testimonialRepository;
    }

    /**
     * Execute action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = (int)$this->getRequest()->getParam('id');

        try {
            if ($id) {
                // Validate testimonial exists using service contract
                $this->testimonialRepository->getById($id);
            }
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage(
                __('This testimonial no longer exists.')
            );

            return $this->_redirect('*/*/');
        }

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();

        $resultPage->setActiveMenu('Kiwi_Testimonials::testimonial');
        $resultPage->getConfig()->getTitle()->prepend(
            $id ? __('Edit Testimonial') : __('New Testimonial')
        );

        return $resultPage;
    }
}
