<?php

class Company_Easytopmenu_Model_Resource_Rule extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('easytopmenu/easytopmenu', 'entity_id');
    }
}
