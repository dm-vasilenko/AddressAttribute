<?php

namespace Web4Pro\AddressAttribute\Plugin\Order;

use Magento\Sales\Controller\Adminhtml\Order\AddressSave;
use Web4Pro\AddressAttribute\Model\OrderAddressFactory;

class SetOrderAddressForm
{
    private $orderAddressModel;

    public function __construct(OrderAddressFactory $orderAddressModel)
    {
        $this->orderAddressModel = $orderAddressModel->create();
    }

    public function afterExecute(AddressSave $subject, $result)
    {
        $entity_id = $subject->getRequest()->getParam('address_id');
        $myAddressType = $subject->getRequest()->getParam('my_address_type');
        $myOrderAddressModel = $this->orderAddressModel->load($entity_id, 'entity_id');
        $myOrderAddressModel->setData('my_address_type', $myAddressType);
        $myOrderAddressModel->save();
        return $result;
    }
}
