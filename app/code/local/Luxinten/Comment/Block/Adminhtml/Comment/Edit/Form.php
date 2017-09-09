<?php

class Luxinten_Comment_Block_Adminhtml_Comment_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $form = new Varien_Data_Form();
        $comment  = Mage::registry('current_comment');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => Mage::helper('comment')->__('COMMENT Information')));

        if ($comment->getId()) {

            $fieldset->addField('id', 'hidden', array(
                'name'      => 'id',
                'required'  => true
            ));
        }

        $fieldset->addField('product', 'text', array(
            'name'      => 'product',
            'label'     => Mage::helper('comment')->__('Product Name'),
            'title'     => Mage::helper('comment')->__('Product Name'),
            'required'  => true,
        ));

        $fieldset->addField('comment', 'text', array(
            'name'      => 'comment',
            'label'     => Mage::helper('comment')->__('Comment'),
            'title'     => Mage::helper('comment')->__('Comment'),
            'required'  => true,
        ));

        $form->addValues($comment->getData());

        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $form->setValues($comment->getData());

        $this->setForm($form);
    }

}
