<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UninstallInterface;

/**
 * Uninstall script for Kiwi Testimonials module
 */
class Uninstall implements UninstallInterface
{
    /**
     * Uninstall module data
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function uninstall(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ): void {
        $setup->startSetup();

        if ($setup->tableExists('kiwi_testimonials')) {
            $setup->getConnection()->dropTable(
                $setup->getTable('kiwi_testimonials')
            );
        }

        $setup->endSetup();
    }
}
