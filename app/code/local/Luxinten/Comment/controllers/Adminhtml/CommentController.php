<?php

class Luxinten_Comment_Adminhtml_CommentController extends Mage_Adminhtml_Controller_Action
{

    protected function _initComment()
    {
        $helper = Mage::helper('comment');
        $this->_title($helper->__('Luxinten'))->_title($helper->__('COMMENT'));

        Mage::register('current_comment', Mage::getModel('comment/comment'));
        $comId = $this->getRequest()->getParam('id');
        if (!is_null($comId)) {
            Mage::registry('current_comment')->load($comId);
        }
    }

    public function indexAction()
    {
        $this->loadLayout();

        $this->_setActiveMenu('luxinten/luxinten_comment');

        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_initComment();

        $this->loadLayout();
        $this->_setActiveMenu('comment/items');
        $this->_addBreadcrumb(Mage::helper('comment')
            ->__('Add new comment'), Mage::helper('comment')->__('Add new comment'));

        $this->_addContent($this->getLayout()->createBlock('comment/adminhtml_comment_edit'));

        $this->renderLayout();
    }

    public function editAction()
    {
        $this->_forward('new');
    }

    /**
     * Create or save comment.
     */
    public function saveAction()
    {

        $data = $this->getRequest()->getPost();
        $user_id = Mage::getSingleton('admin/session')->getUser()->getId();
        if (!empty($data)) {
            try {
                Mage::getModel('comment/comment')->setData($data)->setUserId($user_id)->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('comment')->__('Comment successfully saved'));
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
            }
        }
        return $this->_redirect('*/*/');

    }

    /**
     * Delete comment action
     */
    public function deleteAction()
    {

        $commentId = $this->getRequest()->getParam('id', false);

        try {
            Mage::getModel('comment/comment')->setId($commentId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('comment')->__('Comment successfully deleted'));
            return $this->_redirect('*/*/');
        } catch (Mage_Core_Exception $e){
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
        }

        $this->_redirectReferer();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('comment/adminhtml_comment_grid')->toHtml()
        );
    }

}
