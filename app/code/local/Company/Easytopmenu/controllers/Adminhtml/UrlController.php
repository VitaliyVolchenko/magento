<?php
class Company_Easytopmenu_Adminhtml_UrlController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Rule list page
     */
   public function indexAction()
   {
       $this->_title($this->__('CMS'))->_title($this->__('Manage Top Menu'));
       $this->loadLayout();
       $this->_setActiveMenu('cms/easytopmenu_urls');
       $this->_addContent($this->getLayout()->createBlock('easytopmenu/adminhtml_url'));
       $this->renderLayout();
   }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('easytopmenu/adminhtml_url_grid')->toHtml()
        );
    }
}
