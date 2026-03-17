<?php
namespace Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Save;

/**
 * Interceptor class for @see \Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Save
 */
class Interceptor extends \Kiwi\Testimonials\Controller\Adminhtml\Testimonial\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Kiwi\Testimonials\Api\TestimonialRepositoryInterface $testimonialRepository, \Kiwi\Testimonials\Api\Data\TestimonialInterfaceFactory $testimonialFactory, \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor)
    {
        $this->___init();
        parent::__construct($context, $testimonialRepository, $testimonialFactory, $dataPersistor);
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
