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

    public function newAction() {
        $this->_forward('edit');
    }

    public function editAction() {
        $id     = $this->getRequest()->getParam('id');
        $model  = Mage::getModel('easytopmenu/url')->load($id);

        if ($model->getId() || $id == 0) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
            if (!empty($data)) {
                $model->setData($data);
            }

            Mage::register('easytopmenu_data', $model);

            $this->loadLayout();
            $this->_setActiveMenu('easytopmenu/items');

            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Rule Manager'), Mage::helper('adminhtml')->__('Rule Manager'));
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Rule News'), Mage::helper('adminhtml')->__('Rule News'));

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('easytopmenu/adminhtml_url_edit'))
                ->_addLeft($this->getLayout()->createBlock('easytopmenu/adminhtml_url_edit_tabs'));

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('easytopmenu')->__('Rule does not exist'));
            $this->_redirect('*/*/');
        }
    }

    public function saveAction() {
        if ($data = $this->getRequest()->getPost()) {
            $dbread = Mage::getSingleton('core/resource')->getConnection('core_read');
            $sql = $dbread->query("SELECT entity_id FROM easy_top_menu WHERE name='".$this->getRequest()->getPost('name')."'");
            $res = $sql->fetch();
            $errorMessage="Easy top menu setting for ".$this->getRequest()->getPost('name')." name is allready having,Please edit the ".$res["entity_id"]." id record";

            $model = Mage::getModel('easytopmenu/url');
            $model->setData($data)
                ->setId($this->getRequest()->getParam('id'));

            try {
                if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
                    $model->setCreatedTime(now())
                        ->setUpdateTime(now());
                } else {
                    $model->setUpdateTime(now());
                }
                if ($res["entity_id"] && $res["entity_id"]!=$this->getRequest()->getParam('id')) {
                    throw new Exception($errorMessage);
                    $this->_redirect('*/*/'); }
                else {
                    $model->save();
                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('easytopmenu')->__('Rule was successfully saved'));
                    Mage::getSingleton('adminhtml/session')->setFormData(false);}

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('easytopmenu')->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }

    public function deleteAction() {
        if( $this->getRequest()->getParam('id') > 0 ) {
            try {
                $model = Mage::getModel('easytopmenu/url');

                $model->setId($this->getRequest()->getParam('id'))
                    ->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Rule was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
    public function massDeleteAction() {
        $easytopmenuIds = $this->getRequest()->getParam('easytopmenu');
        if(!is_array($easytopmenuIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
        } else {
            try {
                foreach ($easytopmenuIds as $easytopmenuId) {
                    $rule = Mage::getModel('easytopmenu/url')->load($easytopmenuId);
                    $rule->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__(
                        'Total of %d record(s) were successfully deleted', count($easytopmenuIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
    public function massStatusAction()
    {
        $easytopmenuIds = $this->getRequest()->getParam('easytopmenu');
        if(!is_array($easytopmenuIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select item(s)'));
        } else {
            try {
                foreach ($easytopmenuIds as $easytopmenuId) {
                    $rule = Mage::getSingleton('easytopmenu/url')
                        ->load($skuautofilId)
                        ->setStatus($this->getRequest()->getParam('status'))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($skuautofilIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('cms/easytopmenu_urls');
    }

}
