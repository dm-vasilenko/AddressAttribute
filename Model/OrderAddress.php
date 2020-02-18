<?php

namespace Web4Pro\AddressAttribute\Model;

use Magento\Framework\Model\AbstractModel;
use Web4Pro\AddressAttribute\Model\ResourceModel\OrderAddress as Resource;

class OrderAddress extends AbstractModel
{
    public function _construct()
    {
        $this->_init(Resource::class);
    }
}
