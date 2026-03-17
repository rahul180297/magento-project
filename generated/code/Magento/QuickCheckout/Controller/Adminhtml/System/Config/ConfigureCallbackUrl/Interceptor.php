<?php
namespace Magento\QuickCheckout\Controller\Adminhtml\System\Config\ConfigureCallbackUrl;

/**
 * Interceptor class for @see \Magento\QuickCheckout\Controller\Adminhtml\System\Config\ConfigureCallbackUrl
 */
class Interceptor extends \Magento\QuickCheckout\Controller\Adminhtml\System\Config\ConfigureCallbackUrl implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\QuickCheckout\Model\CallbackUrlService $callbackUrlService, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory)
    {
        $this->___init();
        parent::__construct($context, $callbackUrlService, $resultJsonFactory);
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
