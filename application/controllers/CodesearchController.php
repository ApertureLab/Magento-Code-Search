<?php

class CodesearchController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function indexAction()
    {
        // request
        $request = $this->getRequest();
        // form model
        $form = new Default_Form_Codesearch();
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $codesearch = new Default_Model_Codesearch($form->getValues());
                $this->view->entries = $codesearch->search();
                $this->view->package = $codesearch->getPackage();
            }
        } else {
            //
        }
        
        // form view
        $this->view->form = $form;
    }
}
