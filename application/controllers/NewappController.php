<?php

class NewappController extends Zend_Controller_Action
{
    
    public function init()
    {
        
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $this->_helper->viewRenderer->setNoRender(true);
        $jobs = new Application_Model_DbTable_JobPortal();
        $index = Zend_Search_Lucene::create('C:\indexed');
        $maxBufferedDocs=100;
        $index->setMaxBufferedDocs($maxBufferedDocs);
        
        
        $users = $jobs->fetchAll();
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8Num);
        foreach($users as $user)
         {
           $doc = new Zend_Search_Lucene_Document();
           $doc->addField(Zend_Search_Lucene_Field::Keyword('pri', $user->id));
           $doc->addField(Zend_Search_Lucene_Field::Text('title', $user->title)); //here field = ur database column
           $doc->addField(Zend_Search_Lucene_Field::Text('shortd',$user->shortd));
           $doc->addField(Zend_Search_Lucene_Field::Unstored('longd',$user->longd));
           $doc->addField(Zend_Search_Lucene_Field::Text('exp',$user->exp));
           $doc->addField(Zend_Search_Lucene_Field::Text('location',$user->location));
           $index->addDocument($doc);
         }
        
         $index->commit();   
        $this->_helper->redirector('search');
    }

    public function searchAction()
    {  
        $form = new Application_Form_Search();
        $this->view->form = $form;
        $form->submit->setLabel('search jobs');
        $currentPermissions = Zend_Search_Lucene_Storage_Directory_Filesystem::getDefaultFilePermissions();
        echo $currentPermissions;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($_POST)) {
                $query = $form->getValue('query');
                $index = Zend_Search_Lucene::open('C:\indexed');
                $hits = $index->find($query);
                $this->view->jobs = $hits;
        // foreach ($hits as $hit) {
         //echo $hit->pri;
          //echo $hit->shortd;
         //}
            } else {
                $form->populate($formData);
            }
        }
    }
    
    public function createAction()
    {
       
    }
     

}





