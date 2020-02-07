<?php

namespace Web4Pro\AddressAttribute\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class QuoteAddress extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('web4pro_quote_address_table', 'address_id');
    }
}
