<?php

namespace Web4Pro\AddressAttribute\Plugin\Order;

use Magento\Sales\Block\Adminhtml\Order\Address\Form;
use Web4Pro\AddressAttribute\Model\OrderAddressFactory;

class GetOrderAddressForm
{
    private $orderAddressModel;

    public function __construct(OrderAddressFactory $orderAddressModel)
    {
        $this->orderAddressModel = $orderAddressModel->create();
    }

    public function afterGetFormValues(Form $subject, $result)
    {
        $entity = $this->orderAddressModel->load($result['entity_id'], 'entity_id');
        $result['my_address_type'] = $entity->getMyAddressType();
        return $result;
    }
}
