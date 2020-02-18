<?php

namespace Web4Pro\AddressAttribute\Observer;

use Magento\Framework\Api\ExtensionAttribute\JoinProcessor;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class QuoteAddressCollectionLoad implements ObserverInterface
{
    protected $_joinProcessor;

    public function __construct(JoinProcessor $joinProcessor)
    {
        $this->_joinProcessor = $joinProcessor;
    }
    public function execute(Observer $observer)
    {
        if ($collection = $observer->getEvent()->getQuoteAddressCollection()) {
            $this->_joinProcessor->process($collection);
        }
    }
}
