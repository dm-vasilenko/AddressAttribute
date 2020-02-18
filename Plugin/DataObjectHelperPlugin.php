<?php

namespace Web4Pro\AddressAttribute\Plugin;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Quote\Api\Data\AddressExtensionInterface;

class DataObjectHelperPlugin
{
    public function beforePopulateWithArray(DataObjectHelper $subject, $dataObject, array $data, $interfaceName)
    {
        switch ($interfaceName) {
            case 'Magento\Sales\Api\Data\OrderAddressInterface':
                if ($data['extension_attributes'] instanceof AddressExtensionInterface) {
                    $data['extension_attributes'] = $data['extension_attributes']->__toArray();
                }
                unset($data['extension_attributes']['discounts']);
                break;
            case 'Magento\Customer\Api\Data\AddressInterface':
                if (!empty($data['extension_attributes'])) {
                    if ($data['extension_attributes'] instanceof AddressExtensionInterface) {
                        $data['extension_attributes'] = $data['extension_attributes']->__toArray();
                        unset($data['extension_attributes']['discounts']);
                        if (isset($data['extension_attributes']['my_address_type'])) {
                            $data['my_address_type'] = $data['extension_attributes']['my_address_type'];
                        }
                    }
                }

        }

        return [$dataObject, $data, $interfaceName];
    }
}
