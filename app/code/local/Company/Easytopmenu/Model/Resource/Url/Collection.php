<?php
class Company_Easytopmenu_Model_Resource_Url_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('easytopmenu/url');
        parent::_construct();
    }
}
