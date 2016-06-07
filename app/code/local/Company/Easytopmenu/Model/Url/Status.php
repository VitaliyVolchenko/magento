<?php
class Company_Easytopmenu_Model_Url_Status extends Varien_Object
{
    const STATUS_ENABLED	= 1;
    const STATUS_DISABLED	= 2;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('easytopmenu')->__('Enabled'),
            self::STATUS_DISABLED   => Mage::helper('easytopmenu')->__('Disabled')
        );
    }
}
