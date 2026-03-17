<?php
namespace Hyva\Admin\Controller\Adminhtml\Export\Download;

/**
 * Interceptor class for @see \Hyva\Admin\Controller\Adminhtml\Export\Download
 */
class Interceptor extends \Hyva\Admin\Controller\Adminhtml\Export\Download implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\App\RequestInterface $request, \Magento\Framework\App\Response\Http\FileFactory $fileFactory, \Hyva\Admin\Model\GridExport\GridExportTypeLocator $gridExportLocator, \Hyva\Admin\Model\GridExport\HyvaGridExportInterfaceFactory $gridFactory)
    {
        $this->___init();
        parent::__construct($context, $request, $fileFactory, $gridExportLocator, $gridFactory);
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
