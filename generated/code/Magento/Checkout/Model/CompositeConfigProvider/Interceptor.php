<?php
namespace Magento\Checkout\Model\CompositeConfigProvider;

/**
 * Interceptor class for @see \Magento\Checkout\Model\CompositeConfigProvider
 */
class Interceptor extends \Magento\Checkout\Model\CompositeConfigProvider implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(array $configProviders)
    {
        $this->___init();
        parent::__construct($configProviders);
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getConfig');
        return $pluginInfo ? $this->___callPlugins('getConfig', func_get_args(), $pluginInfo) : parent::getConfig();
    }
}
