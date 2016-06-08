<?php

class Company_Easytopmenu_Block_Adminhtml_Url_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('easytopmenu_form', array('legend'=>Mage::helper('easytopmenu')->__('Rule information')));


        $fieldset->addField('name', 'text', array(
            'label'     => Mage::helper('easytopmenu')->__('Name'),
            'required'  => false,
            'name'      => 'name',
            'after_element_html' => '<small><br/>Enter Name.</small>',
        ));

        $fieldset->addField('url', 'text', array(
            'label'     => Mage::helper('easytopmenu')->__('Url'),
            'required'  => false,
            'name'      => 'url',
            'after_element_html' => '<small>Enter Url</small>',

        ));

        $fieldset->addField('is_enabled', 'select', array(
            'label'     => Mage::helper('easytopmenu')->__('Enabled'),
            'name'      => 'is_enabled',
            'values'    => array(
                array(
                    'value'     => 1,
                    'label'     => Mage::helper('easytopmenu')->__('Enabled'),
                ),

                array(
                    'value'     => 2,
                    'label'     => Mage::helper('easytopmenu')->__('Disabled'),
                ),
            ),
        ));


        if ( Mage::getSingleton('adminhtml/session')->getSkuautofillerData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getEasytopmenuData());
            Mage::getSingleton('adminhtml/session')->setSkuautofillerData(null);
        } elseif ( Mage::registry('easytopmenu_data') ) {
            $form->setValues(Mage::registry('easytopmenu_data')->getData());
        }
        return parent::_prepareForm();
    }
}
