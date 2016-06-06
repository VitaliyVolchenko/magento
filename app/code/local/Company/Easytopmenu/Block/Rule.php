<?php
class Company_Easytopmenu_Block_Rule extends Mage_Core_Block_Template
{
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getRule()
    {
        if (!$this->hasData('easytopmenu')) {
            $this->setData('easytopmenu', Mage::registry('easytopmenu'));
        }
        return $this->getData('easytopmenu');

    }
}
