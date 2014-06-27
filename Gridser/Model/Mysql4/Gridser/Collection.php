<?php

class Faisal_Gridser_Model_Mysql4_Gridser_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('gridser/gridser');
    }

}