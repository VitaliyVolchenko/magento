<?php
class Luxinten_Comment_Block_Adminhtml_Comment extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    /**
     * this is handle to block that set in config
     */
    protected $_blockGroup = 'comment';

    public function __construct()
    {
        /**
         * this is path to grid block
         */
        $this->_controller = 'adminhtml_comment';

        $this->_headerText = Mage::helper('comment')->__('Comment Manager');
        $this->_addButtonLabel = Mage::helper('comment')->__('Add Comment');

        parent::__construct();
    }

    /**
     * Redefine header css class
     *
     * @return string
     */
    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }

}