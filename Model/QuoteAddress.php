<?php

namespace Web4Pro\AddressAttribute\Model;

use Magento\Framework\Model\AbstractModel;

class QuoteAddress extends AbstractModel
{
    public function _construct()
    {
        $this->_init(\Web4Pro\AddressAttribute\Model\ResourceModel\QuoteAddress::class);
    }
}
