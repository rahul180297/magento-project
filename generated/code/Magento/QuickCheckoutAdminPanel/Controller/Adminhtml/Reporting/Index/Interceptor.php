<?php
namespace Magento\QuickCheckoutAdminPanel\Controller\Adminhtml\Reporting\Index;

/**
 * Interceptor class for @see \Magento\QuickCheckoutAdminPanel\Controller\Adminhtml\Reporting\Index
 */
class Interceptor extends \Magento\QuickCheckoutAdminPanel\Controller\Adminhtml\Reporting\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\App\RequestInterface $request, \Magento\QuickCheckoutAdminPanel\Model\Reporting\ReportingService $service, \Magento\Framework\Controller\Result\JsonFactory $jsonFactory)
    {
        $this->___init();
        parent::__construct($context, $request, $service, $jsonFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function execute() : \Magento\Framework\Controller\ResultInterface
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
