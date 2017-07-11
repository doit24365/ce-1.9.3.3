<?php
/**
 * Final date block
 *
 * @category  Test
 * @package   Test_FinalDate
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */

class Test_FinalDate_Block_Checkout_Finaldate extends Mage_Core_Block_Template
{
    /**
     * Retrieve final date from quote or order
     * Used for:
     *      success page,
     *      shopping cart,
     *      checkout steps,
     *      admin order view
     *
     * @return string
     */
    public function getFinalDate()
    {
        if (Mage::app()->getRequest()->getActionName() === 'success') {
            $finalDate = Mage::getSingleton('checkout/session')
                ->getLastRealOrder()
                ->getFinalDate();
        } elseif (Mage::app()->getRequest()->getControllerName() === 'sales_order') {
            $finalDate = Mage::registry('sales_order')->getFinalDate();
        } else {
            $finalDate = Mage::getSingleton('checkout/session')
                ->getQuote()
                ->getFinalDate();
        }

        return Mage::helper('test_finaldate')->getHumanReadableDate($finalDate);
    }
}
