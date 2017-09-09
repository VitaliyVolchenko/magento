<?php

$installer = $this;

$tableCom = $installer->getTable('comment/comment');

$installer->startSetup();

$installer->getConnection()->dropTable($tableCom);
$table = $installer->getConnection()->newTable($tableCom)
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ))
    ->addColumn('product', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => false,
    ))
    ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => false,
    ));
$installer->getConnection()->createTable($table);
$installer->getConnection()->insertForce($tableCom, array(
    'id'        => 1,
    'product'          => 'prod1',
    'comment'   => 'comment1',
));

$installer->endSetup();