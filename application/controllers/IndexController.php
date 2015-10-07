<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $jobs = new Application_Model_DbTable_JobPortal();
        $this->view->jobs = $jobs->fetchAll();
    }

    public function addAction()
    {
        // action body
        $form = new Application_Form_Jobsf();
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        echo $this->getRequest()->isPost();
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            //echo $form->isValid($formData);
            if ($form->isValid($_POST)) {
                $title = $form->getValue('title');
                $shortd = $form->getValue('shortd');
                $longd = $form->getValue('longd');
                $exp = $form->getValue('exp');
                $location = $form->getValue('location');
                $jobs = new Application_Model_DbTable_JobPortal();
                $jobs->addJob($title,$shortd,$longd,$exp,$location);
                
                $this->_redirect('/');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editAction()
    {
        // action body
        $form = new Application_Form_Jobsf();
        $form->submit->setLabel('Save');
        $id = $this->_getParam('id', 0);
        //echo $id;
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                //$id = $this->getRequest()->getPost('id');
                $title = $form->getValue('title');
                $shortd = $form->getValue('shortd');
                $longd = $form->getValue('longd');
                $exp = $form->getValue('exp');
                $location = $form->getValue('location');
                $jobs = new Application_Model_DbTable_JobPortal();
                $jobs->updateJob($id,$title,$shortd,$longd,$exp,$location);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
           // $id = $this->_getParam('id', 0);
           // echo $id;
            if ($id > 0) {
                $jobs = new Application_Model_DbTable_JobPortal();
                $form->populate($jobs->getJob($id));
            }
        }
    }

    public function deleteAction()
    {
        // action body
        
        // action body
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $jobs = new Application_Model_DbTable_JobPortal();
                $jobs->deleteJob($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $jobs = new Application_Model_DbTable_JobPortal();
            $this->view->job = $jobs->getJob($id);
        }
    }

    public function desAction()
    {
        // action body
        $id = $this->_getParam('id', 0);
        $jobs = new Application_Model_DbTable_JobPortal();
       $this->view->job = $jobs->getJob($id);
    }

    public function newappAction()
    {
        // action body
    }

    public function faafAction()
    {
        // action body
    }


}













