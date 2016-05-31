<?php
$installer = $this;

$installer->startSetup();

$installer->run("

DROP TABLE IF EXISTS `{$this->getTable('easy_top_menu')}`;
CREATE TABLE `{$this->getTable('easy_top_menu')}` (
  `entity_id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `is_enabled` tinyint(1) NOT NULL default '0',
  `parent_id` int(11) unsigned NOT NULL,
  `url` varchar(255) NOT NULL default '',
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 ");
$installer->run("INSERT INTO `{$this->getTable('easy_top_menu')}` (
`entity_id` ,
`name` ,
`is_enabled` ,
`parent_id` ,
`url`
)
VALUES (
NULL , 'namee', '1', '1', 'urll'
)");

$installer->endSetup();

