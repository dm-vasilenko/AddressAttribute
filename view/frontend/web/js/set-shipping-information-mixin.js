define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote'
], function ($, wrapper, quote) {
    'use strict';

    return function (setShippingInformationAction) {

        return wrapper.wrap(setShippingInformationAction, function (originalAction) {
            var shippingAddress = quote.shippingAddress();

            var value = $('select[name=my_address_type]').attr('value');
            if (shippingAddress['extension_attributes'] === undefined) {
                shippingAddress['extension_attributes'] = {};
            }

            $.each(shippingAddress.customAttributes, function(index, eachCustomAttribute){
                if(eachCustomAttribute.attribute_code == 'my_address_type')
                {
                    shippingAddress['extension_attributes']['my_address_type'] = eachCustomAttribute.value ;
                }
            });
            if(!shippingAddress.customAttributes){
                shippingAddress['extension_attributes']['my_address_type'] = value;
            }
            if (shippingAddress.customAttributes !== undefined){
                delete shippingAddress.customAttributes[1];
            }
            return originalAction();
        });
    };
});
