<?php
class Company_Easytopmenu_Model_Observer
{
    public function addeasytopmenu(Varien_Event_Observer $observer){

        $model = Mage::getModel('easytopmenu/url');
        $collection = $model->getCollection()->load();

        $menu = $observer->getMenu();
        $tree = $menu->getTree();

            foreach ($collection as $category) {

                $name = $category->getUrl();
                if (isset($name)) {
                    $node = new Varien_Data_Tree_Node(array(
                        'name'   => $name,
                        'id'     => 'categories'.$category->getId(),
                        'url'    => Mage::getUrl(),
                    ), 'id', $tree, $menu);

                    $menu->addChild($node);
                }
            }
        //echo 'hehe';
    }
}
