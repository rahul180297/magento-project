<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;
use Kiwi\Testimonials\Api\TestimonialRepositoryInterface;

/**
 * Delete testimonial controller
 */
class Delete extends Action
{
    /**
     * Authorization level
     */
    public const ADMIN_RESOURCE = 'Kiwi_Testimonials::delete';

    /**
     * Testimonial repository
     *
     * @var TestimonialRepositoryInterface
     */
    private TestimonialRepositoryInterface $testimonialRepository;

    /**
     * @param Action\Context $context
     * @param TestimonialRepositoryInterface $testimonialRepository
     */
    public function __construct(
        Action\Context $context,
        TestimonialRepositoryInterface $testimonialRepository
    ) {
        parent::__construct($context);
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

        if (!$id) {
            $this->messageManager->addErrorMessage(
                __('We can\'t find a testimonial to delete.')
            );

            return $this->_redirect('*/*/');
        }

        try {
            $this->testimonialRepository->deleteById($id);

            $this->messageManager->addSuccessMessage(
                __('The testimonial has been deleted.')
            );
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());

            return $this->_redirect('*/*/edit', ['id' => $id]);
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(
                __('An error occurred while deleting the testimonial.')
            );

            return $this->_redirect('*/*/edit', ['id' => $id]);
        }

        return $this->_redirect('*/*/');
    }
}
