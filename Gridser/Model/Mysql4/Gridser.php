<?php

class Faisal_Gridser_Model_Mysql4_Gridser extends Mage_Core_Model_Mysql4_Abstract {

    protected function _construct() {
        $this->_init('gridser/gridser', 'entity_id');
    }

}