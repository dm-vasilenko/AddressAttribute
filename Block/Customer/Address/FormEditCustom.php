<?php

namespace Web4Pro\AddressAttribute\Block\Customer\Address;

use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;

class FormEditCustom extends Template
{
    /**
     * @var AddressMetadataInterface
     */
    private $addressMetadata;
    /**
     * @var AddressInterface
     */
    private $address;

    /**
     * FormEditCustom constructor.
     * @param Template\Context $context
     * @param AddressMetadataInterface $addressMetadata
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        AddressMetadataInterface $addressMetadata,
        array $data = []
    ) {
        $this->addressMetadata = $addressMetadata;
        parent::__construct($context, $data);
    }

    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('address/custom.phtml');
        $this->address = $this->getData('address');
    }

    public function getAttribute()
    {
        try {
            $attribute = $this->addressMetadata->getAttributeMetadata('my_address_type');
        } catch (NoSuchEntityException $e) {
            return null;
        }
        return $attribute;
    }

    public function getSelectedValue()
    {
        return $this->address->getCustomAttribute('my_address_type')
            ? $this->address->getCustomAttribute('my_address_type')->getValue()
            : null;
    }

    public function getFieldLabel()
    {
        return $this->getAttribute()
            ? $this->getAttribute()->getFrontendLabel()
            : __('My address type');
    }

    public function isRequired()
    {
        return $this->getAttribute()
            ? $this->getAttribute()->isRequired()
            : false;
    }
}
