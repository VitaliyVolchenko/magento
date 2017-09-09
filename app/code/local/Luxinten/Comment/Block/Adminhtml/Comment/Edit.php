<?php

class Luxinten_Comment_Block_Adminhtml_Comment_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    
    public function __construct()
    {
        $this->_objectId = 'id';
        parent::__construct();
        
        $this->_blockGroup = 'comment';
        $this->_mode = 'edit';
        $this->_controller = 'adminhtml_comment';
        $this->_updateButton('save', 'label', Mage::helper('comment')->__('Save Comment'));
        $this->_updateButton('delete', 'label', Mage::helper('comment')->__('Delete Comment'));

        if (!Mage::registry('current_comment')->getId()) {

            $this->removeButton('delete');
        }

    }

    public function getHeaderText()
    {

        if( Mage::registry('current_comment') && Mage::registry('current_comment')->getId() ) {
            return Mage::helper('comment')->__("Edit Comment (%s)", $this->escapeHtml(Mage::registry('current_comment')->getQuestion()));
        } else {
            return Mage::helper('comment')->__('Add new Comment');
        }
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-comment';
    }

}
