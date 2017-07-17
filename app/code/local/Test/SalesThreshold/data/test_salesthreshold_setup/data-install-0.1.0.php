<?php
/**
 * Fill data manager and postcode tables
 *
 * @category  Test
 * @package   Test_SalesThreshold
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$managerTable = $installer->getTable('test_salesthreshold/manager');
$postcodeTable = $installer->getTable('test_salesthreshold/postcode');
if (!$installer->tableExists($managerTable)
    || !$installer->tableExists($postcodeTable)
) {
    return $this;
}

// Clear tables
$installer->getConnection()->truncateTable($managerTable);
$installer->getConnection()->truncateTable($postcodeTable);

$filepath = dirname(dirname(__FILE__)) . '/account_managers.csv';
if (!file_exists($filepath)) {
    return $this;
}

$inputData = [];
$handle = @fopen($filepath, 'r');
if ($handle) {
    while (($buffer = fgetcsv($handle, 4096)) !== false) {
        if (!isset($buffer[0]) || !isset($buffer[1])) {
            continue;
        }
        $inputData[$buffer[0]] = $buffer[1];
    }
    fclose($handle);
}

// Remove headers
unset($inputData[key($inputData)]);
$managers = array_unique($inputData);

$installer->getConnection()->insertArray(
    $managerTable,
    ['manager_name'],
    $managers
);

$postcodes = [];
$managerCollection = Mage::getResourceModel(
    'test_salesthreshold/manager_collection'
);
foreach ($managerCollection as $item) {
    foreach ($inputData as $postcode => $managerName) {
        if ($item->getManagerName() === $managerName) {
            $postcodes[] = [
                'postcode' => $postcode,
                'manager_id' => $item->getId(),
            ];
        }
    }
}

$installer->getConnection()->insertArray(
    $postcodeTable,
    ['postcode', 'manager_id'],
    $postcodes
);

$installer->endSetup();
