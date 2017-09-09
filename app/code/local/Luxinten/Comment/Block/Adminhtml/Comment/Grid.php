<?php

class Luxinten_Comment_Block_Adminhtml_Comment_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();

        $this->setId('comment_comment_grid');
        $this->setUseAjax(true);
        $this->setDefaultSort('id');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {

        $collection = Mage::getModel('comment/comment')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header'    => Mage::helper('comment')->__('Id'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'id',
        ));

        $this->addColumn('product', array(
            'header'    => Mage::helper('comment')->__('Product'),
            'align'     =>'left',
            'index'     => 'product',
        ));

        $this->addColumn('comment', array(
            'header'    => Mage::helper('comment')->__('Comment'),
            'align'     =>'left',
            'index'     => 'comment',
        ));

        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('comment')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('comment')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'entity_id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
            ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {

        $url = $this->getUrl('*/*/edit', array('id' => $row->getId()));

        return $url;
    }
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }

}