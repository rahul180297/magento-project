<?php
namespace Hyva\ReactCheckout\Result\Json;

/**
 * Interceptor class for @see \Hyva\ReactCheckout\Result\Json
 */
class Interceptor extends \Hyva\ReactCheckout\Result\Json implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Translate\InlineInterface $translateInline, \Magento\Framework\Serialize\Serializer\Json $serializer)
    {
        $this->___init();
        parent::__construct($translateInline, $serializer);
    }

    /**
     * {@inheritdoc}
     */
    public function renderResult(\Magento\Framework\App\ResponseInterface $response)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'renderResult');
        return $pluginInfo ? $this->___callPlugins('renderResult', func_get_args(), $pluginInfo) : parent::renderResult($response);
    }
}
