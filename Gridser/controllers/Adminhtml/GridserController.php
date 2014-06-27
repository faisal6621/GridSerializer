<?php

class Faisal_Gridser_Adminhtml_GridserController extends Mage_Adminhtml_Controller_Action {

    protected function _initAction($item, $title) {
        $this->loadLayout()
                ->_setActiveMenu("gridser/$item")
        ;
        $this->_title($title);
    }

    public function indexAction() {
        $this->_initAction('manage', 'Manage Grid Serializer');
        $this->_addContent($this->getLayout()->createBlock('gridser/adminhtml_gridser'));
        $this->renderLayout();
    }

    public function newAction() {
        $this->_forward('edit');
    }

    public function editAction() {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('gridser/gridser')->load($id);

        if ($model->getId() || $id == 0) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
            if (!empty($data)) {
                $model->setData($data);
            }

            Mage::register('gridser_data', $model);

            $this->_initAction('manage', 'Edit Grid Serializer');

            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('gridser/adminhtml_gridser_edit'))
                    ->_addLeft($this->getLayout()->createBlock('gridser/adminhtml_gridser_edit_tabs'));

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('gridser')->__('Item does not exist'));
            $this->_redirect('*/*/');
        }
    }

    public function saveAction() {
        $post = $this->getRequest()->getPost();
        echo '<pre>';
        print_r($post);
        print_r(Mage::helper('adminhtml/js')->decodeGridSerializedInput($post['links']['products']));
    }

    public function productsAction() {
        $this->loadLayout();
        $this->getLayout()->getBlock('gridser.edit.tab.products')
                ->setProducts($this->getRequest()->getPost('products', null));
        $this->renderLayout();
    }

    public function productsGridAction() {
        $this->loadLayout();
        $this->getLayout()->getBlock('gridser.edit.tab.products')
                ->setProducts($this->getRequest()->getPost('products', null));
        $this->renderLayout();
    }

}