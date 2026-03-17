<?php
namespace Magento\QuickCheckout\Controller\Ajax\Logout;

/**
 * Interceptor class for @see \Magento\QuickCheckout\Controller\Ajax\Logout
 */
class Interceptor extends \Magento\QuickCheckout\Controller\Ajax\Logout implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Customer\Model\Session $customerSession, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory)
    {
        $this->___init();
        parent::__construct($customerSession, $resultJsonFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }
}
