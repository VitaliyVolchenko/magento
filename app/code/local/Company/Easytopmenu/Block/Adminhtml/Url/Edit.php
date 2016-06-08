<?php

class Company_Easytopmenu_Block_Adminhtml_Url_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'easytopmenu';
        $this->_controller = 'adminhtml_url';

        $this->_updateButton('save', 'label', Mage::helper('easytopmenu')->__('Save Url'));
        $this->_updateButton('delete', 'label', Mage::helper('easytopmenu')->__('Delete Url'));

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('easytopmenu_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'easytopmenu_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'easytopmenu_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('easytopmenu_data') && Mage::registry('easytopmenu_data')->getId() ) {
            return Mage::helper('easytopmenu')->__("Edit Rule (%s)", $this->htmlEscape(Mage::registry('easytopmenu_data')->getProductType()));
        } else {
            return Mage::helper('easytopmenu')->__('Add Rule');
        }
    }
}
