<?php

namespace Web4Pro\AddressAttribute\Observer;

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
        $order = $observer->getAddress();
        $extensionAttributes = $order->getExtensionAttributes();

            $extensionAttributes = $this->getOrderExtensionDependency();

        $attr = $order->getData('my_address_type');
        $extensionAttributes->setOrderAttribute($attr);
        $order->setExtensionAttributes($extensionAttributes);
    }
    private function getOrderExtensionDependency()
    {
        $orderExtension = \Magento\Framework\App\ObjectManager::getInstance()->get(
            '\Magento\Sales\Api\Data\OrderExtension'
        );
        return $orderExtension;
    }
}
