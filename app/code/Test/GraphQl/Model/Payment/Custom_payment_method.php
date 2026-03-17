<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Test\GraphQl\Model\Payment;

use Magento\Payment\Model\Method\AbstractMethod;
use Magento\Quote\Api\Data\CartInterface;

class Custom_payment_method extends AbstractMethod
{

    protected $_code = "custom_payment_method";
    protected $_isOffline = true;

    public function isAvailable(CartInterface $quote = null): bool
    {
        return parent::isAvailable($quote);
    }
}

