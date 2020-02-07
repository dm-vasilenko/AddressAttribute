<?php

namespace Web4Pro\AddressAttribute\Model\Source;

class AddressType extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * @inheritDoc
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['label' => __('Residence'), 'value' => 0],
                ['label' => __('Business'), 'value' => 1],
            ];
        }
        return $this->_options;
    }
}
