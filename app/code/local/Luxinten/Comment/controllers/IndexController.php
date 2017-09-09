<?php
class Luxinten_Comment_IndexController extends Mage_Core_Controller_Front_Action{

    public function indexAction()
    {
        $this->renderLayout();
        $this->loadLayout();
    }

    public function saveAction()
    {

        $productId = Mage::getSingleton('catalog/session')->getLastViewedProductId();

            $product = Mage::getModel('catalog/product')->setStoreId(Mage::app()
                ->getStore()->getId())
                ->load($productId);
            $productName = $product->getName();

        $model = Mage::getModel('comment/comment');

        $post = $this->getRequest()->getPost();

        if (isset($post['comment'])) {
            $model->load($post['comment']);
        }

        $model->setData($post);
        $model->setProduct($productName);

        try {
            $model->save();
            Mage::getUrl('catalog/product/index');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('comment')->__('Comment successfully saved'));
        } catch(Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
        }
        $this->_redirectReferer();
    }

}