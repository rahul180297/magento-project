<?php
namespace Hyva\AdminTest\Controller\Adminhtml\Test\DumpQueryVars;

/**
 * Interceptor class for @see \Hyva\AdminTest\Controller\Adminhtml\Test\DumpQueryVars
 */
class Interceptor extends \Hyva\AdminTest\Controller\Adminhtml\Test\DumpQueryVars implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\App\RequestInterface $request, \Magento\Framework\Controller\Result\JsonFactory $jsonFactory, \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->___init();
        parent::__construct($context, $request, $jsonFactory, $pageFactory);
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
