<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Test\GraphQl\Config\Enable;

use Magento\Framework\Module\Dir\Reader;

class SchemaLocator implements \Magento\Framework\Config\SchemaLocatorInterface
{

    private ?string $schema;
    private ?string $perFileSchema;

    public function __construct(private Reader $moduleReader)
    {
        $etcDir = $moduleReader->getModuleDir(Dir::MODULE_ETC_DIR, 'Experius_Test');
        $this->schema = $etcDir . '/example_merged.xsd';
        $this->perFileSchema = $etcDir . '/example.xsd';
    }

    public function getSchema(): ?string
    {
        return $this->schema;
    }

    public function getPerFileSchema(): ?string
    {
        return $this->perFileSchema;
    }
}

