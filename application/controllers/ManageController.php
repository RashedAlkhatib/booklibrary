<?php

class ManageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->contextSwitch()
        //add context for datatablesAction() Response is JSON
       ->addActionContext('datatable', 'json')
       ->initContext();

parent::init();
    }

    public function indexAction()
    {
        // action body

        $manages = new Application_Model_DbTable_ManageBook();
        $this->view->manages = $manages->fetchAll();
        $authors = new Application_Model_DbTable_Authors();
        $this->view->authors = $authors->fetchAll();
        $labels = new Application_Model_DbTable_Labels();
        $this->view->labels = $labels->fetchAll();
 
 
    }

    public function addAction()
    {
         
$uniqueimg=uniqid();
        $Bauthor_explode = explode('|', $_POST['author_book']);
        $Book_Label_Explode = explode(',', implode(',', $_POST['label']));
   
        $ID_Type_Explode = explode('|', $_POST['id']);
        $book_model=new Application_Model_DbTable_ManageBook();
        // action body
 
        if(move_uploaded_file($_FILES['file']['tmp_name'],"images/".$uniqueimg.$_FILES['file']['name'])) {


            $last_inserted_id=$book_model->addManageBook($_POST['Booktitle_Book'],$_POST['Bookdiscreption_Book'],$Bauthor_explode[0]);
      
            $book_label_model= New Application_Model_DbTable_BookLabel();
           
            for ($i=0; $i <=count($Book_Label_Explode)+1 ; $i++) { 
         
             if ($Book_Label_Explode[$i]!="") {
         
         
          $book_label_model->addBookLabels($last_inserted_id,$Book_Label_Explode[$i] );
          
             }
            
            }
            $book_images_model= New Application_Model_DbTable_BookImages();
            $book_images_model->addBookImages( $last_inserted_id, $uniqueimg.$_FILES['file']['name']  );
          
      
          }else{
      
            $last_inserted_id=$book_model->addManageBook($_POST['Booktitle_Book'],$_POST['Bookdiscreption_Book'],$Bauthor_explode[0]);
      
            $book_label_model= New Application_Model_DbTable_BookLabel();
           
            for ($i=0; $i <=count($Book_Label_Explode)+1 ; $i++) { 
         
             if ($Book_Label_Explode[$i]!="") {
         
         
                $book_label_model->addBookLabels($last_inserted_id,$Book_Label_Explode[$i] );
          
             }
            
            }
       
          }
      
        
    }

    public function editAction()
    {
 
        $uniqueimg=uniqid();




        

        $Bauthor_explode = explode('|', $_POST['author_book']);
        $Book_Label_Explode = explode(',', implode(',', $_POST['label']));
   
        $ID_Type_Explode = explode('|', $_POST['id']);
        $book_model=new Application_Model_DbTable_ManageBook();
        // action body
 
        $book_label_model= New Application_Model_DbTable_BookLabel();
        $book_images_model= New Application_Model_DbTable_BookImages();
        if(isset($_FILES['file']['name'])){

          $book_images_model->deleteBookImages( $_POST['id']);
        
         }
      if(  move_uploaded_file($_FILES['file']['tmp_name'],"images/".$uniqueimg.$_FILES['file']['name']) ){
        $book_images_model->addBookImages($_POST['id'],"images/".$uniqueimg.$_FILES['file']['name'] );
        
        $book_images_model->updateBookImages("images/".$uniqueimg.$_FILES['file']['name'] ,$_POST['id']);
   
    }  
     
      $book_model->updateManageBook($_POST['Booktitle_Book'],$_POST['Bookdiscreption_Book'],$Bauthor_explode[0],$_POST['id']);
        
        $book_model->updateManageBook($_POST['Booktitle_Book'],$_POST['Bookdiscreption_Book'], $Bauthor_explode[0],$_POST['id']);
      
         $book_label_model->deleteBookLabels($_POST['id']);
    
        
       
        for ($i=0; $i <=count($Book_Label_Explode)+1 ; $i++) { 
       
       
         if ($Book_Label_Explode[$i]!=""   ) {
        $book_label_model->addBookLabels( $_POST['id'], $Book_Label_Explode[$i] );
    
         }
        
        }
    
 
    }

    public function deleteAction()
    {
        $Books = new Application_Model_DbTable_ManageBook();
        $Books->deleteManageBook($_POST['id']);
        
 
    } 
 

 
}







