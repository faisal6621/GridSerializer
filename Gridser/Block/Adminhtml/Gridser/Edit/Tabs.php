<?php

class Faisal_Gridser_Block_Adminhtml_Gridser_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

    public function __construct() {
        parent::__construct();
        $this->setId('gridser_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('gridser')->__('Block Tab Title'));
    }

    protected function _prepareLayout() {
        $this->addTab('products_tab', array(
            'label' => Mage::helper('gridser')->__('Products'),
            'title' => Mage::helper('gridser')->__('Products'),
            'url' => $this->getUrl('*/*/products', array('_current' => true)),
            'class' => 'ajax',
        ));
        return parent::_prepareLayout();
    }

}