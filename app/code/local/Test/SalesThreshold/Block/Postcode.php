<?php
/**
 * Postcode Grid
 *
 * @category  Test
 * @package   Test_SalesThreshold
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */
class Test_SalesThreshold_Block_Postcode
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Constructor
     *
     * @return null
     */
    public function __construct()
    {
        $this->_blockGroup      = 'test_salesthreshold';
        $this->_controller      = 'postcode';
        parent::__construct();

        $this->_removeButton('add');
    }
}
