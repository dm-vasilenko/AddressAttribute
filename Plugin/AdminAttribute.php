<?php

namespace Web4Pro\AddressAttribute\Plugin;

use Magento\Sales\Block\Adminhtml\Order\View\Info;

class AdminAttribute
{
    public function beforeGetFormattedAddress(Info $subject, $address)
    {
        if ($attributes = $address->getExtensionAttributes()) {
            $address->setMyAddressType($attributes->getMyAddressType());
        }
        return [$address];
    }
}
