<?php

$installer = $this;
$installer->startSetup();
$installer->run(
        "
    CREATE TABLE `{$this->getTable('gridser/gridser')}` (
        `entity_id` int(11) unsigned not null auto_increment,
        `title` varchar(255) not null default '',
        `products` text not null default '',
        PRIMARY KEY (`entity_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
"
);
$installer->endSetup();