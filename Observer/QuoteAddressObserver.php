<?php

namespace Web4Pro\AddressAttribute\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Web4Pro\AddressAttribute\Model\QuoteAddressFactory;

class QuoteAddressObserver implements ObserverInterface
{
    private $modelFactory;

    public function __construct(QuoteAddressFactory $modelFactory)
    {
        $this->modelFactory = $modelFactory;
    }

    public function execute(Observer $observer)
    {
        $quoteAddress = $observer->getQuoteAddress();
        $address = $quoteAddress->getExtensionAttributes();
        if ($address->getMyAddressType() !== null && $quoteAddress->getAddressType() == 'shipping') {
            $model = $this->modelFactory->create();
            $data = [
                'address_id' => $quoteAddress->getAddressId(),
                'my_address_type' => $address->getMyAddressType()
            ];
            $model->setData($data);
            $model->save();
        }
    }
}
