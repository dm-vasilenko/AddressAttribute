<?php

namespace Web4Pro\AddressAttribute\Observer\Order;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Web4Pro\AddressAttribute\Model\OrderAddressFactory;

class OrderAddressObserver implements ObserverInterface
{
    private $modelFactory;

    public function __construct(OrderAddressFactory $modelFactory)
    {
        $this->modelFactory = $modelFactory;
    }

    public function execute(Observer $observer)
    {
        $orderAddress = $observer->getAddress();
        $address_attr = $orderAddress->getExtensionAttributes();
        if ($address_attr->getMyAddressType() !== null && $orderAddress->getAddressType() == 'shipping') {
            $model = $this->modelFactory->create();
            $data = [
                'entity_id' => $orderAddress->getId(),
                'my_address_type' => $address_attr->getMyAddressType()
            ];
            $model->setData($data);
            $model->save();
        }
    }
}
