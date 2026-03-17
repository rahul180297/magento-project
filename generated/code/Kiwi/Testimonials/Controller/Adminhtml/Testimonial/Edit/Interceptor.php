<?php
namespace Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Edit;

/**
 * Interceptor class for @see \Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Edit
 */
class Interceptor extends \Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Edit implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Kiwi\Testimonials\Api\TestimonialRepositoryInterface $testimonialRepository)
    {
        $this->___init();
        parent::__construct($context, $resultPageFactory, $testimonialRepository);
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
