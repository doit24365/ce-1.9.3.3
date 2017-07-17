<?php
/**
 * Add custom attribute to order
 *
 * @category  Test
 * @package   Test_SalesThreshold
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */ 
/* @var $installer Mage_Sales_Model_Resource_Setup */
$installer = new Mage_Sales_Model_Resource_Setup('core_setup');

$installer->startSetup();

$installer->addAttribute(
    'order', 'manager_id', array('type' => Varien_Db_Ddl_Table::TYPE_INTEGER)
);

$installer->endSetup();
