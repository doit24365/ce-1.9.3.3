<?php
/**
 * Test_FinalDate_Helper_Data
 *
 * @category  Test
 * @package   Test_FinalDate
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */
class Test_FinalDate_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Retrieve human readable date format
     *
     * @param string $date - date string
     *
     * @return string
     */
    public function getHumanReadableDate($date)
    {
        $format = Mage::app()->getLocale()->getDateFormat(
            Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM
        );

        return Mage::getSingleton('core/locale')->date(
            $date,
            Zend_Date::ISO_8601,
            null,
            false
        )->toString($format);
    }
}
