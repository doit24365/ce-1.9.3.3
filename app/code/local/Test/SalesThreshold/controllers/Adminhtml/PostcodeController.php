<?php
/**
 * Postcode
 *
 * @category  Test
 * @package   Test_SalesThreshold
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */
class Test_SalesThreshold_Adminhtml_PostcodeController
    extends Mage_Adminhtml_Controller_Action
{
    /**
     * Index Action
     *
     * @return null
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_addContent(
            $this->getLayout()->createBlock('test_salesthreshold/postcode')
        );
        $this->renderLayout();
    }

    /**
     * Acl
     *
     * @return bool
     */
    public function _isAllowed()
    {
        return Mage::getSingleton('admin/session')
            ->isAllowed('sales/test_postcodes');
    }
}
