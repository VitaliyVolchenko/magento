<?php

class Company_Easytopmenu_Block_Adminhtml_Rule extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'easytopmenu';
        $this->_controller = 'adminhtml_rule';
        $this->_headerText = Mage::helper('easytopmenu')->__('Rule Manager');
        $this->_addButtonLabel = Mage::helper('easytopmenu')->__('Add Rule');
        parent::__construct();
    }
}
