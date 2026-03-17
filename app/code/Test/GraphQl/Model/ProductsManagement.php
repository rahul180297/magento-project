<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Test\GraphQl\Model;

class ProductsManagement implements \Test\GraphQl\Api\ProductsManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getProducts($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
}

