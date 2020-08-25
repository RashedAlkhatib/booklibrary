<?php

class Application_Model_DbTable_BookLabel extends Zend_Db_Table_Abstract
{

    protected $_name = 'Book_Labels';
    protected  $_primary ='id';
    public function getBookLabels($id)     
    {
        $id = (int)$id;
        $row = $this->fetchRow('author_id = ' . $id);
        if (!$row) {
        throw new Exception("Could not find row $id");
        }
        return $row->toArray(); 


    }


       public function addBookLabels($last_inserted_id, $Book_Label_Explode)
       {   
      
       $data = array(
       'id' => $last_inserted_id,
       'labelid' => $Book_Label_Explode,
                     );
       $this->insert($data);
       }

       public function updateBookLabels(  $lableid,$id)
       {
  
       $data = array(
       'lableid' => $lableid,
        
       );
       $this->update($data, 'lableid = '. (int)$id);
       }

       public function deleteBookLabels($id)
       {
 
       $this->delete('id =' . (int)$id);
       }

}

