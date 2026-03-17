<?php
namespace Magento\QuickCheckout\Controller\Ajax\Login;

/**
 * Interceptor class for @see \Magento\QuickCheckout\Controller\Ajax\Login
 */
class Interceptor extends \Magento\QuickCheckout\Controller\Ajax\Login implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\RequestInterface $request, \Magento\QuickCheckout\Model\Bolt\Auth\IdTokenDecoder $tokenDecoder, \Magento\QuickCheckout\Model\Bolt\Auth\OauthTokenResolver $tokenResolver, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Customer\Model\CustomerFactory $customerFactory, \Magento\Customer\Model\ResourceModel\Customer $customerResource, \Magento\Customer\Model\Session $customerSession, \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager, \Magento\Framework\Stdlib\Cookie\CookieMetadataFactory $cookieMetadataFactory, \Magento\Framework\Serialize\Serializer\Json $serializer, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory, \Magento\QuickCheckout\Model\Bolt\Auth\OauthTokenSessionStorage $tokenSessionStorage, \Magento\QuickCheckout\Model\Config $config, \Psr\Log\LoggerInterface $logger)
    {
        $this->___init();
        parent::__construct($request, $tokenDecoder, $tokenResolver, $storeManager, $customerFactory, $customerResource, $customerSession, $cookieManager, $cookieMetadataFactory, $serializer, $resultJsonFactory, $tokenSessionStorage, $config, $logger);
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
