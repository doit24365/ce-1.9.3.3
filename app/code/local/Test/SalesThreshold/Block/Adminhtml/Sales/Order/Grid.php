<?php
/**
 * Sales Order Grid
 *
 * @category  Test
 * @package   Test_SalesThreshold
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */ 
class Test_SalesThreshold_Block_Adminhtml_Sales_Order_Grid
    extends Mage_Adminhtml_Block_Sales_Order_Grid
{

    /**
     * Prepare collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        /**
         * @var Mage_Sales_Model_Resource_Order_Grid_Collection $collection
         */
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $select = $collection->getSelect();
        $select->joinLeft(
            array(
            'order' => Mage::getModel('core/resource')->getTableName('sales/order')),
            'order.entity_id = main_table.entity_id',
            array('manager_id' => 'manager_id')
        );
        $this->setCollection($collection);
        return Mage_Adminhtml_Block_Widget_Grid::_prepareCollection();
    }

    /**
     * Add custom column
     *
     * @return $this
     */
    protected function _prepareColumns()
    {
        parent::_prepareColumns();
        /**
         * @var Test_SalesThreshold_Model_Resource_Manager_Collection $collection
         */
        $collection = Mage::getResourceModel(
            'test_salesthreshold/manager_collection'
        );

        $this->addColumn(
            'manager_id', array(
                'header' => $this->__('Manager'),
                'index' => 'manager_id',
                'type' => 'options',
                'filter' => false,
                'options' => $collection->toOptionHash(),
            )
        );

        return $this;

    }
}
