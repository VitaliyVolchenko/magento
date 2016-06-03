<?php

class Company_Easytopmenu_Model_Rule extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('easytopmenu/rule');
    }
}
