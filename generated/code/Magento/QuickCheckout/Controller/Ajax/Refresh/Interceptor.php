<?php
namespace Magento\QuickCheckout\Controller\Ajax\Refresh;

/**
 * Interceptor class for @see \Magento\QuickCheckout\Controller\Ajax\Refresh
 */
class Interceptor extends \Magento\QuickCheckout\Controller\Ajax\Refresh implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\RequestInterface $request, \Magento\QuickCheckout\Model\Bolt\Auth\OauthTokenResolver $tokenResolver, \Magento\Customer\Model\Session $customerSession, \Magento\Framework\Serialize\Serializer\Json $serializer, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory, \Magento\QuickCheckout\Model\Bolt\Auth\OauthTokenSessionStorage $tokenSessionStorage, \Psr\Log\LoggerInterface $logger)
    {
        $this->___init();
        parent::__construct($request, $tokenResolver, $customerSession, $serializer, $resultJsonFactory, $tokenSessionStorage, $logger);
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
