<?php
namespace Kiwi\Testimonials\Console\Command\ImportTestimonials;

/**
 * Interceptor class for @see \Kiwi\Testimonials\Console\Command\ImportTestimonials
 */
class Interceptor extends \Kiwi\Testimonials\Console\Command\ImportTestimonials implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Kiwi\Testimonials\Api\TestimonialRepositoryInterface $testimonialRepository, \Kiwi\Testimonials\Api\Data\TestimonialInterfaceFactory $testimonialFactory, \Magento\Framework\Filesystem\Driver\File $fileDriver)
    {
        $this->___init();
        parent::__construct($testimonialRepository, $testimonialFactory, $fileDriver);
    }

    /**
     * {@inheritdoc}
     */
    public function run(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'run');
        return $pluginInfo ? $this->___callPlugins('run', func_get_args(), $pluginInfo) : parent::run($input, $output);
    }
}
