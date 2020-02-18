var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-shipping-information': {
                'Web4Pro_AddressAttribute/js/set-shipping-information-mixin': true
            },
            'Magento_Checkout/js/action/create-shipping-address': {
                'Web4Pro_AddressAttribute/js/create-shipping-address-mixin': true
            },
            'Magento_Checkout/js/view/shipping-address/address-renderer/default': {
                'Web4Pro_AddressAttribute/js/shipping-address/default-mixin': true
            },
            'Magento_Checkout/js/view/shipping-information/address-renderer/default': {
                'Web4Pro_AddressAttribute/js/shipping-information/default-mixin': true
            },
            'Magento_Checkout/js/view/billing-address': {
                'Web4Pro_AddressAttribute/js/billing-address': true
            }
        }
    },
    map: {
        '*': {
            'Magento_Checkout/template/shipping-address/address-renderer/default.html':
                'Web4Pro_AddressAttribute/template/shipping-address/address-renderer/default.html'
        }
    }
};
