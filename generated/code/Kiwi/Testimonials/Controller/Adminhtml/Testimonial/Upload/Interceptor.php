<?php
namespace Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Upload;

/**
 * Interceptor class for @see \Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Upload
 */
class Interceptor extends \Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Upload implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory, \Magento\Framework\Filesystem $filesystem)
    {
        $this->___init();
        parent::__construct($context, $uploaderFactory, $filesystem);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
