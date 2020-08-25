<?php

class AuthorsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body

        $authors = new Application_Model_DbTable_Authors();
        $this->view->authors = $authors->fetchAll();
 
 
    }

    public function addAction()
    {
        // action body
        $authors = new Application_Model_DbTable_Authors();

     
        $authors->addAuthors($_POST['Authorname_Author'],$_POST['Authoremail_Author']);   
     }

    public function editAction()
    {
        // action body
        $authors = new Application_Model_DbTable_Authors();

     
        $authors->updateAuthors($_POST['id'],$_POST['Authorname_Author'],$_POST['Authoremail_Author']);  
  
    }

    public function deleteAction()
    {
        // action body
        $authors = new Application_Model_DbTable_Authors();

     
        $authors->deleteAuthors($_POST['id']);  
  
    }  


}







