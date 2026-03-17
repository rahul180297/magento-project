<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\Backend\App\Action;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Framework\Exception\LocalizedException;
use Kiwi\Testimonials\Api\TestimonialRepositoryInterface;
use Kiwi\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory;

/**
 * Mass delete testimonials controller
 */
class MassDelete extends Action
{
    /**
     * Authorization level
     */
    public const ADMIN_RESOURCE = 'Kiwi_Testimonials::delete';

    /**
     * Mass action filter
     *
     * @var Filter
     */
    private Filter $filter;

    /**
     * Testimonial collection factory
     *
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;

    /**
     * Testimonial repository
     *
     * @var TestimonialRepositoryInterface
     */
    private TestimonialRepositoryInterface $testimonialRepository;

    /**
     * @param Action\Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param TestimonialRepositoryInterface $testimonialRepository
     */
    public function __construct(
        Action\Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        TestimonialRepositoryInterface $testimonialRepository
    ) {
        parent::__construct($context);
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->testimonialRepository = $testimonialRepository;
    }

    /**
     * Execute action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection(
                $this->collectionFactory->create()
            );

            $deleted = 0;

            foreach ($collection as $testimonial) {
                $this->testimonialRepository->deleteById(
                    (int)$testimonial->getId()
                );
                $deleted++;
            }

            if ($deleted) {
                $this->messageManager->addSuccessMessage(
                    __('A total of %1 testimonial(s) have been deleted.', $deleted)
                );
            }
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(
                __('An error occurred while deleting testimonials.')
            );
        }

        return $this->_redirect('*/*/index');
    }
}
