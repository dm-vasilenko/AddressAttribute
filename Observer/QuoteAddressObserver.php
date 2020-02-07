<?php

namespace Web4Pro\AddressAttribute\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Quote\Api\Data\AddressExtension;
use Web4Pro\AddressAttribute\Model\QuoteAddressFactory;

class QuoteAddressObserver implements ObserverInterface
{
    private $modelFactory;

    private $extensionFactory;

    public function __construct(QuoteAddressFactory $modelFactory, AddressExtension $extensionFactory)
    {
        $this->modelFactory = $modelFactory;
        $this->extensionFactory = $extensionFactory;
    }

    public function execute(Observer $observer)
    {
        $address = $observer->getEvent()->getExtensionAttributes();
    }
}
