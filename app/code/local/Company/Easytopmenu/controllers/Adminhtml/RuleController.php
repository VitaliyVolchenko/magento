<?php
class Company_Easytopmenu_Adminhtml_RuleController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Rule list page
     */
   public function indexAction()
   {
       $this->_title($this->__('CMS'))->_title($this->__('Manage Top Menu'));
       $this->loadLayout();
       $this->_setActiveMenu('cms/easytopmenu_rules');
       $this->_addContent($this->getLayout()->createBlock('easytopmenu/adminhtml_rule'));
       $this->renderLayout();
   }




}
