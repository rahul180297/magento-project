<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\Backend\App\Action;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Filesystem;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Controller\ResultFactory;

/**
 * Profile picture upload controller
 */
class Upload extends Action
{
    /**
     * Authorization level
     */
    public const ADMIN_RESOURCE = 'Kiwi_Testimonials::save';

    /**
     * File uploader factory
     *
     * @var UploaderFactory
     */
    protected UploaderFactory $uploaderFactory;

    /**
     * Filesystem
     *
     * @var Filesystem
     */
    protected Filesystem $filesystem;

    /**
     * @param Action\Context $context
     * @param UploaderFactory $uploaderFactory
     * @param Filesystem $filesystem
     */
    public function __construct(
        Action\Context $context,
        UploaderFactory $uploaderFactory,
        Filesystem $filesystem
    ) {
        parent::__construct($context);
        $this->uploaderFactory = $uploaderFactory;
        $this->filesystem = $filesystem;
    }

    /**
     * Execute action
     *
     * Handles testimonial profile image upload
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $uploader = $this->uploaderFactory->create(['fileId' => 'profile_pic']);
        $uploader->setAllowedExtensions(['jpg', 'jpeg', 'png']);
        $uploader->setAllowRenameFiles(true);
        $uploader->setFilesDispersion(false);

        $mediaDirectory = $this->filesystem
            ->getDirectoryWrite(DirectoryList::MEDIA)
            ->getAbsolutePath('testimonial');

        $result = $uploader->save($mediaDirectory);

        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->resultFactory->create(
            ResultFactory::TYPE_JSON
        );

        return $resultJson->setData([
            'name' => $result['file'],
            'url'  => 'testimonial/' . $result['file'],
        ]);
    }
}
