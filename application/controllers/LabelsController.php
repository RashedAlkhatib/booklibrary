<?php

class LabelsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body

        $labels = new Application_Model_DbTable_Labels();
        $this->view->labels = $labels->fetchAll();
 
 
    }

    public function addAction()
    {
        
        $label_model = new Application_Model_DbTable_Labels();
        
        $label_model->addLabels( $_POST['Labels'] );
 
 
    }

    public function editAction()
    {
        // action body
        $label_model = new Application_Model_DbTable_Labels();
        
        $label_model->updateLabels( $_POST['id'],$_POST['Labels'] );
    }

    public function deleteAction()
    {
        // action body
        $label_model = new Application_Model_DbTable_Labels();
        
        $label_model->deleteLabels( $_POST['id'] );
  
 
    }  


}







