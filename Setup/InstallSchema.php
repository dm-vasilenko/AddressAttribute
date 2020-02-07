<?php

namespace Web4Pro\AddressAttribute\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();
        $this->createOrderAddressTable($installer);
        $this->createQuoteAddressTable($installer);

        $installer->endSetup();
    }

    public function createOrderAddressTable($installer)
    {
        if (!$installer->tableExists('web4pro_order_address_table')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('web4pro_order_address_table')
            )->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                [
                        'nullable' => false,
                        'primary'  => true,
                    ],
                'Order address id'
            )->addColumn(
                'my_address_type',
                Table::TYPE_INTEGER,
                32,
                [
                        'nullable' => false,
                    ],
                'Address type'
            )->setComment('Extension order attribute table');
            $installer->getConnection()->createTable($table);
        }
    }

    public function createQuoteAddressTable($installer)
    {
        if (!$installer->tableExists('web4pro_quote_address_table')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('web4pro_quote_address_table')
            )
                ->addColumn(
                    'address_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'primary'  => true
                    ],
                    'Quote address id'
                )->addColumn(
                    'my_address_type',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                    ],
                    'Address type'
                )->setComment('Extension quote attribute table');

            $installer->getConnection()->createTable($table);
        }
    }
}
