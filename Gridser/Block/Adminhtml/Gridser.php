<?php

class Faisal_Gridser_Block_Adminhtml_Gridser extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {
        $this->_blockGroup = 'gridser';
        $this->_controller = 'adminhtml_gridser';
        $this->_headerText = Mage::helper('gridser')->__('Manage Product Grid Serializer');
        $this->_addButtonLabel = Mage::helper('gridser')->__('Add Product Grid');
        parent::__construct();
    }

}