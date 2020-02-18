<?php

namespace Web4Pro\AddressAttribute\Model\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class AddressType extends AbstractSource
{
    /**
     * @inheritDoc
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['label' => __('Residence'), 'value' => 1],
                ['label' => __('Business'), 'value' => 2],
            ];
        }
        return $this->_options;
    }
}
