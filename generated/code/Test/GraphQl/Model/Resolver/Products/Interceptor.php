<?php
namespace Test\GraphQl\Model\Resolver\Products;

/**
 * Interceptor class for @see \Test\GraphQl\Model\Resolver\Products
 */
class Interceptor extends \Test\GraphQl\Model\Resolver\Products implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Test\GraphQl\Model\Resolver\DataProvider\Products $productsDataProvider)
    {
        $this->___init();
        parent::__construct($productsDataProvider);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(\Magento\Framework\GraphQl\Config\Element\Field $field, $context, \Magento\Framework\GraphQl\Schema\Type\ResolveInfo $info, ?array $value = null, ?array $args = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'resolve');
        return $pluginInfo ? $this->___callPlugins('resolve', func_get_args(), $pluginInfo) : parent::resolve($field, $context, $info, $value, $args);
    }
}
