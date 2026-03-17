<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Request\DataPersistorInterface;
use Kiwi\Testimonials\Api\TestimonialRepositoryInterface;
use Kiwi\Testimonials\Api\Data\TestimonialInterfaceFactory;

/**
 * Save testimonial controller
 */
class Save extends Action
{
    /**
     * Authorization level
     */
    public const ADMIN_RESOURCE = 'Kiwi_Testimonials::save';

    /**
     * Testimonial repository
     *
     * @var TestimonialRepositoryInterface
     */
    private TestimonialRepositoryInterface $testimonialRepository;

    /**
     * Testimonial factory
     *
     * @var TestimonialInterfaceFactory
     */
    private TestimonialInterfaceFactory $testimonialFactory;

    /**
     * Data persistor
     *
     * @var DataPersistorInterface
     */
    private DataPersistorInterface $dataPersistor;

    /**
     * @param Action\Context $context
     * @param TestimonialRepositoryInterface $testimonialRepository
     * @param TestimonialInterfaceFactory $testimonialFactory
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Action\Context $context,
        TestimonialRepositoryInterface $testimonialRepository,
        TestimonialInterfaceFactory $testimonialFactory,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct($context);
        $this->testimonialRepository = $testimonialRepository;
        $this->testimonialFactory = $testimonialFactory;
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * Execute action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            return $this->_redirect('*/*/');
        }

        $id = (int)$this->getRequest()->getParam('id');

        try {
            if ($id) {
                $testimonial = $this->testimonialRepository->getById($id);
            } else {
                $testimonial = $this->testimonialFactory->create();
            }

            // Normalize image field
            if (isset($data['profile_pic'][0]['name'])) {
                $data['profile_pic'] = $data['profile_pic'][0]['name'];
            } elseif (isset($data['profile_pic']['delete']) && $data['profile_pic']['delete']) {
                $data['profile_pic'] = null;
            } else {
                unset($data['profile_pic']);
            }

            $testimonial->setCompanyName($data['company_name'] ?? '');
            $testimonial->setName($data['name'] ?? '');
            $testimonial->setPost($data['post'] ?? '');
            $testimonial->setStatus((int)($data['status'] ?? 0));
            $testimonial->setMessage($data['message'] ?? '');
            $testimonial->setProfilePic($data['profile_pic'] ?? null);

            $this->testimonialRepository->save($testimonial);

            $this->messageManager->addSuccessMessage(
                __('The testimonial has been saved.')
            );
            $this->dataPersistor->clear('kiwi_testimonial');

            if ($this->getRequest()->getParam('back')) {
                return $this->_redirect(
                    '*/*/edit',
                    ['id' => $testimonial->getId()]
                );
            }

            return $this->_redirect('*/*/');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(
                __('Something went wrong while saving the testimonial.')
            );
        }

        $this->dataPersistor->set('kiwi_testimonial', $data);

        return $this->_redirect('*/*/edit', ['id' => $id]);
    }
}
