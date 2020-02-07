<?php

namespace Web4Pro\AddressAttribute\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class OrderAddress extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('web4pro_order_address_table', 'entity_id');
    }
}
