<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Test\GraphQl\Config\Enable;

use Converter;
use Magento\Framework\Config\Dom;
use Magento\Framework\Config\FileResolverInterface;
use Magento\Framework\Config\ValidationStateInterface;
use SchemaLocator;

class Reader extends \Magento\Framework\Config\Reader\Filesystem
{

    // protected array $_idAttributes = [
    //     '/config/example' => 'id',
    // ];

    // public function __construct(
    //     private FileResolverInterface $fileResolver,
    //     private Converter $converter,
    //     private SchemaLocator $schemaLocator,
    //     private ValidationStateInterface $validationState,
    //     private string $fileName = 'example.xml',
    //     private array $idAttributes = [],
    //     private string $domDocumentClass = Dom::class,
    //     private string $defaultScope = 'global'
    // ) {
    //     parent::__construct(
    //         $fileResolver,
    //         $converter,
    //         $schemaLocator,
    //         $validationState,
    //         $fileName,
    //         $idAttributes,
    //         $domDocumentClass,
    //         $defaultScope
    //     );
    // }
}

