define([
    'jquery',
    'mage/utils/wrapper'
], function ($, wrapper) {
    'use strict';

    return function (createShippingAddress) {

        return wrapper.wrap(createShippingAddress, function (originalAction, addressData) {
            if (addressData['custom_attributes'] === undefined) {
                addressData['custom_attributes'] = {};
            }
            addressData['custom_attributes']['my_address_type'] = addressData.my_address_type;
            if(addressData.my_address_type == 1)
            {
                addressData.custom_attributes['label'] = 'Residence'
            } else {
                addressData.custom_attributes['label'] = 'Business'
            }

            return originalAction(addressData);
        });
    };
});
