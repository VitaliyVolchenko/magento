<?php

class Company_Easytopmenu_Model_Url extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('easytopmenu/url');
    }
}
