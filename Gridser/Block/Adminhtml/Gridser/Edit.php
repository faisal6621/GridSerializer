<?php

class Faisal_Gridser_Block_Adminhtml_Gridser_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'gridser';
        $this->_controller = 'adminhtml_gridser';

        $this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
                ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('gridser_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'gridser_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'gridser_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText() {
        if (Mage::registry('gridser_data') && Mage::registry('gridser_data')->getId()) {
            return Mage::helper('gridser')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('gridser_data')->getTitle()));
        } else {
            return Mage::helper('gridser')->__('Add New ...');
        }
    }

}