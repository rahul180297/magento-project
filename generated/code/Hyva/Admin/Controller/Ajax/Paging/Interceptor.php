<?php
namespace Hyva\Admin\Controller\Ajax\Paging;

/**
 * Interceptor class for @see \Hyva\Admin\Controller\Ajax\Paging
 */
class Interceptor extends \Hyva\Admin\Controller\Ajax\Paging implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\RequestInterface $request, \Hyva\Admin\Model\GridBlockRenderer $gridBlockRenderer, \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory)
    {
        $this->___init();
        parent::__construct($request, $gridBlockRenderer, $jsonResultFactory);
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
