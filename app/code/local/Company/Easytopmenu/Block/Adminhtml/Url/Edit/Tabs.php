<?php

class Company_Easytopmenu_Block_Adminhtml_Url_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('easytopmenu_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('easytopmenu')->__('Rule Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
            'label'     => Mage::helper('easytopmenu')->__('Rule Information'),
            'title'     => Mage::helper('easytopmenu')->__('Rule Information'),
            'content'   => $this->getLayout()->createBlock('easytopmenu/adminhtml_url_edit_tab_form')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }
}
