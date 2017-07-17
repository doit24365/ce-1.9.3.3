<?php
/**
 * Resource
 *
 * @category  Test
 * @package   Test_SalesThreshold
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */ 
class Test_SalesThreshold_Model_Resource_Manager
    extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * Constructor
     *
     * @return null
     */
    protected function _construct()
    {
        $this->_init('test_salesthreshold/manager', 'entity_id');
    }
}
