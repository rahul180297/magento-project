<?php
namespace Hyva\Admin\Controller\Export\Download;

/**
 * Interceptor class for @see \Hyva\Admin\Controller\Export\Download
 */
class Interceptor extends \Hyva\Admin\Controller\Export\Download implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\RequestInterface $request, \Magento\Framework\App\Response\Http\FileFactory $fileFactory, \Hyva\Admin\Model\GridExport\GridExportTypeLocator $gridExportLocator, \Hyva\Admin\Model\GridExport\HyvaGridExportInterfaceFactory $gridFactory)
    {
        $this->___init();
        parent::__construct($request, $fileFactory, $gridExportLocator, $gridFactory);
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
