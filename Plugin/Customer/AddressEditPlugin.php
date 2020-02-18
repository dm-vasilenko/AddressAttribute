<?php

namespace Web4Pro\AddressAttribute\Plugin\Customer;

use Magento\Customer\Block\Address\Edit;

class AddressEditPlugin
{
    public function afterGetNameBlockHtml(Edit $subject, $result)
    {
        $customBlock = $subject->getLayout()->createBlock(
            'Web4Pro\AddressAttribute\Block\Customer\Address\FormEditCustom',
            'my_block_address_type',
            [ 'data' =>[
                'address' => $subject->getAddress(),
                ]
            ]
        );
        return $result . $customBlock->toHtml();
    }
}
