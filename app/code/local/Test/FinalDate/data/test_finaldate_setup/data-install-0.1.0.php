<?php
/**
 * Add final_date attribute
 *
 * @category  Test
 * @package   Test_FinalDate
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */

/* @var $installer Mage_Eav_Model_Entity_Setup */
$installer = $this;

$installer->startSetup();

$attributeSetId = $installer->getDefaultAttributeSetId('catalog_product');
$installer->addAttribute(
    'catalog_product',
    'final_date',
    array(
        'group' => 'General',
        'input' => 'date',
        'type' => 'datetime',
        'label' => 'Final date',
        'required' => false,
        'user_defined' => true,
        'visible' => true,
        'searchable' => false,
        'filterable' => false,
        'comparable' => false,
        'used_in_product_listing' => false,
        'apply_to' => array('simple'),
        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'backend' => 'eav/entity_attribute_backend_datetime',
        'frontend' => 'eav/entity_attribute_frontend_datetime',
        'unique' => false,
        'note' => 'Final date',
    )
);

$installer->updateAttribute(
    'catalog_product',
    'final_date',
    'is_visible_on_front',
    1
);

$installer->endSetup();
