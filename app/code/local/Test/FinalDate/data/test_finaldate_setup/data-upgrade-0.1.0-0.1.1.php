<?php
/**
 * Add final_date attribute to quote and order entities
 *
 * @category  Test
 * @package   Test_FinalDate
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */

/* @var $installer Mage_Sales_Model_Resource_Setup */
$installer = new Mage_Sales_Model_Resource_Setup('core_setup');

$installer->startSetup();

$entities = array(
    'quote',
    'quote_item',
    'order',
    'order_item'
);

$options = array(
    'type'     => Varien_Db_Ddl_Table::TYPE_DATE,
    'visible'  => true,
    'required' => false
);

foreach ($entities as $entity) {
    $installer->addAttribute($entity, 'final_date', $options);
}

$installer->endSetup();
