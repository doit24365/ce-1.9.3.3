<?php
/**
 * Observer
 *
 * @category  Test
 * @package   Test_SalesThreshold
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */
class Test_SalesThreshold_Model_Observer
{
    /**
     * Check threshold and set manager if need
     *
     * @param Varien_Event_Observer $observer - observer
     *
     * @return null
     */
    public function checkSalesThreshold(Varien_Event_Observer $observer)
    {
        /** @var Mage_Sales_Model_Order $order */
        $order = $observer->getOrder();

        $threshold = (float) Mage::getStoreConfig(
            'test_sales/settings/salesthreshold'
        );
        // If order over threshold need to set manager
        if ((float) $order->getGrandTotal() > $threshold) {
            if ($order) {
                $postcode = $order->getShippingAddress()->getPostcode();

                /**
                 * @var Test_SalesThreshold_Model_Resource_Postcode_Collection $postcodes
                 */
                $postcodes = Mage::getResourceModel(
                    'test_salesthreshold/postcode_collection'
                );
                $postcodes->addFieldToFilter('postcode', $postcode)
                    ->setPageSize(1)
                    ->setCurPage(1);
                if ($postcodes->getFirstItem()->getManagerId()) {
                    $order->setManagerId($postcodes->getFirstItem()->getManagerId());
                }
            }
        }
    }
}
