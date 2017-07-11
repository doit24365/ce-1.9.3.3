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
     * Retrieve final date from quote
     *
     * @return array
     */
    public function getFinalDate()
    {
        $finalDate = Mage::getSingleton('checkout/session')
            ->getQuote()
            ->getFinalDate();

        return Mage::helper('test_finaldate')->getHumanReadableDate($finalDate);
    }
}
