<?php

namespace Web4Pro\AddressAttribute\Model;

use Magento\Framework\Model\AbstractModel;
use Web4Pro\AddressAttribute\Model\ResourceModel\QuoteAddress as Resource;

class QuoteAddress extends AbstractModel
{
    public function _construct()
    {
        $this->_init(Resource::class);
    }
}
