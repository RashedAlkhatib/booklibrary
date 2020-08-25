<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
        /* Initialize action controller here */
    }
 public $wheretest ;
    public function indexAction()
    {
        // action body

        $books = new Application_Model_DbTable_Books();
        $this->view->books = $books->fetchAll( );
       
        $authors = new Application_Model_DbTable_Authors();
        $this->view->authors = $authors->fetchAll();
    
        $labels = new Application_Model_DbTable_Labels();
        $this->view->labels = $labels->fetchAll();
    }

  
}







