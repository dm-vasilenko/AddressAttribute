<?php

namespace Web4Pro\AddressAttribute\Setup;

use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * @var EavSetupFactory
     */
    private $_eavSetupFactory;

    /**
     * @param Config $eavConfig
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        Config $eavConfig,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->eavConfig            = $eavConfig;
        $this->_eavSetupFactory     = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            'customer_address',
            'my_address_type',
            [
            'type' => 'int',
            'input' => 'select',
            'label' => 'Address Type',
            'visible' => true,
            'required' => false,
            'system'=> false,
            'position' => 150,
            'sort_order' => 150,
            'group'=> 'General',
            'global' => true,
            'visible_on_front' => true,
            'source' => 'Web4Pro\AddressAttribute\Model\Source\AddressType'
        ]
        );

        $customAttribute = $this->eavConfig->getAttribute('customer_address', 'my_address_type');

        $customAttribute->setData(
            'used_in_forms',
            ['adminhtml_customer_address','customer_address_edit','customer_register_address'] //list of forms where you want to display the custom attribute
        );
        $customAttribute->save();

        $setup->endSetup();
    }
}
