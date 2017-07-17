<?php
/**
 * Create tables for managers and postcodes (one to many relationship)
 *
 * @category  Test
 * @package   Test_SalesThreshold
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$tableName = $installer->getTable('test_salesthreshold/manager');
if (!$installer->tableExists($tableName)) {
    $table = $installer->getConnection()
        ->newTable($tableName)
        ->addColumn(
            'entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
                'identity'  => true,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                ],
            'Entity Id'
        )
        ->addColumn(
            'manager_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, [],
            'Account Manager'
        )
        ->setComment('List of Account Managers');
    $installer->getConnection()->createTable($table);
}

$tableName = $installer->getTable('test_salesthreshold/postcode');
if (!$installer->tableExists($tableName)) {
    $table = $installer->getConnection()
        ->newTable($tableName)
        ->addColumn(
            'entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
            'identity'  => true,
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
            ],
            'Entity Id'
        )
        ->addColumn(
            'postcode', Varien_Db_Ddl_Table::TYPE_VARCHAR, 20, [],
            'Postcode'
        )
        ->addColumn(
            'manager_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
                'unsigned'  => true,
                'nullable'  => false,
                ],
            'Manager Id'
        )
        ->addIndex(
            $installer->getIdxName(
                'test_salesthreshold/postcode', array('postcode')
            ),
            array('postcode')
        )
        ->addForeignKey(
            $installer->getFkName(
                'test_salesthreshold/postcode', 'manager_id',
                'test_salesthreshold/manager', 'entity_id'
            ),
            'manager_id',
            $installer->getTable('test_salesthreshold/manager'), 'entity_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE
        )
        ->setComment('Postcodes and managers');
    $installer->getConnection()->createTable($table);
}

$installer->endSetup();
