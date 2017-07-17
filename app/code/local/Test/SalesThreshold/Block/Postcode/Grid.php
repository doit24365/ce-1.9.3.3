<?php
/**
 * Grid
 *
 * @category  Test
 * @package   Test_SalesThreshold
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */
class Test_SalesThreshold_Block_Postcode_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Constructor
     *
     * @return null
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('grid_id');
         $this->setDefaultSort('postcode');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    /**
     * Prepare collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        /**
         * @var Test_SalesThreshold_Model_Resource_Postcode_Collection $collection
         */
        $collection = Mage::getResourceModel(
            'test_salesthreshold/postcode_collection'
        );
        $collection->join(
            array('manager' => 'test_salesthreshold/manager'),
            'manager.entity_id = main_table.manager_id',
            array('manager_name')
        );
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Prepare columns
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'entity_id',
            array(
               'header'=> $this->__('Entity Id'),
               'index' => 'entity_id'
            )
        );
        $this->addColumn(
            'postcode',
            array(
               'header'=> $this->__('Postcode'),
               'index' => 'postcode'
            )
        );
        $this->addColumn(
            'manager',
            array(
               'header'=> $this->__('Manager'),
               'index' => 'manager_name'
            )
        );

        $this->addExportType('*/*/exportCsv', $this->__('CSV'));

        $this->addExportType('*/*/exportExcel', $this->__('Excel XML'));
        
        return parent::_prepareColumns();
    }
}
