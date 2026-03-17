<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Test\GraphQl\Api;

interface ProductsManagementInterface
{

    /**
     * GET for products api
     * @param string $param
     * @return string
     */
    public function getProducts($param);
}

