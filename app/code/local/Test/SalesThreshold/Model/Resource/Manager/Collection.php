<?php
/**
 * Collection
 *
 * @category  Test
 * @package   Test_SalesThreshold
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */ 
class Test_SalesThreshold_Model_Resource_Manager_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    /**
     * Constructor
     *
     * @return null
     */
    protected function _construct()
    {
        $this->_init('test_salesthreshold/manager');
    }

    /**
     * Convert items array to hash for select options
     *
     * Return items hash
     * array($value => $label)
     *
     * @return array
     */
    public function toOptionHash()
    {
        return $this->_toOptionHash('entity_id', 'manager_name');
    }
}
