<?php
/**
 * Final date attribute observer
 *
 * @category  Test
 * @package   Test_FinalDate
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */

class Test_FinalDate_Model_Observer
{
    /**
     * Set custom attribute to quote items
     *
     * @param Varien_Event_Observer $observer - observer
     *
     * @return null
     */
    public function salesQuoteItemSetCustomAttribute(Varien_Event_Observer $observer)
    {
        $quoteItem = $observer->getQuoteItem();
        $product = $observer->getProduct();
        $quoteItem->setFinalDate($product->getFinalDate());
    }

    /**
     * Set custom attribute to quote
     *
     * @param Varien_Event_Observer $observer - observer
     *
     * @return $this
     */
    public function salesQuoteSetCustomAttribute(Varien_Event_Observer $observer)
    {
        $finalDates = [];

        $quote = $observer->getEvent()->getCart()->getQuote();
        $quoteItems = $quote->getAllItems();
        foreach ($quoteItems as $quoteItem) {
            if ($quoteItem->getProductType() !== 'configurable') {
                $finalDates[] = new DateTime($quoteItem->getFinalDate());
            }
        }

        $quote->setFinalDate(max($finalDates)->format(Zend_Date::ISO_8601));

        return $this;
    }
}
