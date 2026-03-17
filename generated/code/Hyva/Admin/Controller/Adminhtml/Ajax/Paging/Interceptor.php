<?php
namespace Hyva\Admin\Controller\Adminhtml\Ajax\Paging;

/**
 * Interceptor class for @see \Hyva\Admin\Controller\Adminhtml\Ajax\Paging
 */
class Interceptor extends \Hyva\Admin\Controller\Adminhtml\Ajax\Paging implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\App\RequestInterface $request, \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory, \Hyva\Admin\Model\GridBlockRenderer $gridBlockRenderer)
    {
        $this->___init();
        parent::__construct($context, $request, $jsonResultFactory, $gridBlockRenderer);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
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
