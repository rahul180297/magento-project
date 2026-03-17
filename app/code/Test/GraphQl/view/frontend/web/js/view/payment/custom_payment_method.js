define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'custom_payment_method',
                component: 'Test_GraphQl/js/view/payment/method-renderer/custom_payment_method-method'
            }
        );
        return Component.extend({});
    }
);