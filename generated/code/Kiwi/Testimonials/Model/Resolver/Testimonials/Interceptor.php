<?php
namespace Kiwi\Testimonials\Model\Resolver\Testimonials;

/**
 * Interceptor class for @see \Kiwi\Testimonials\Model\Resolver\Testimonials
 */
class Interceptor extends \Kiwi\Testimonials\Model\Resolver\Testimonials implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Kiwi\Testimonials\Api\TestimonialRepositoryInterface $repository, \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder)
    {
        $this->___init();
        parent::__construct($repository, $searchCriteriaBuilder);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve($field, $context, \Magento\Framework\GraphQl\Schema\Type\ResolveInfo $info, ?array $value = null, ?array $args = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'resolve');
        return $pluginInfo ? $this->___callPlugins('resolve', func_get_args(), $pluginInfo) : parent::resolve($field, $context, $info, $value, $args);
    }
}
