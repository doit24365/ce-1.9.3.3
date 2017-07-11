<?php
/**
 * Additional config
 *
 * @category  Test
 * @package   Test_FinalDate
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */

class Test_FinalDate_Block_Catalog_Product_View_Type_Configurable
    extends Mage_Catalog_Block_Product_View_Type_Configurable
{
    /**
     * Returns additional values for js config
     * Retrieve final_date attribute value for each product
     *
     * @return array
     */
    protected function _getAdditionalConfig()
    {
        $additionalData = ['finalDate' => []];

        $products = $this->getProduct()
            ->getTypeInstance()
            ->getUsedProductCollection($this->getProduct())
            ->addFilterByRequiredOptions()
            ->addAttributeToSelect('final_date');

        foreach ($products as $product) {
            if ($product->getFinalDate()) {
                $additionalData['finalDate'][$product->getId()]
                    = Mage::helper('test_finaldate')
                    ->getHumanReadableDate($product->getFinalDate());
            }
        }

        return $additionalData;
    }
}
