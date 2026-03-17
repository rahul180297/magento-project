<?php
namespace Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Delete;

/**
 * Interceptor class for @see \Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Delete
 */
class Interceptor extends \Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Delete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Kiwi\Testimonials\Api\TestimonialRepositoryInterface $testimonialRepository)
    {
        $this->___init();
        parent::__construct($context, $testimonialRepository);
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
