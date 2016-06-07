<?php
class Company_Easytopmenu_Block_Adminhtml_Url extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'easytopmenu';
        $this->_controller = 'adminhtml_url';
        $this->_headerText = Mage::helper('easytopmenu')->__('Url Manager');
        $this->_addButtonLabel = Mage::helper('easytopmenu')->__('Add Url');
        parent::__construct();
    }
}
