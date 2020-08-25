<?php

class Application_Model_DbTable_BookImages extends Zend_Db_Table_Abstract
{

    protected $_name = 'Book_Images';
 
    public function getBookImages($id)     
    {
        $id = (int)$id;
        $row = $this->fetchRow('author_id = ' . $id);
        if (!$row) {
        throw new Exception("Could not find row $id");
        }
        return $row->toArray(); 


    }


       public function addBookImages($last_inserted_id, $uniqueimg)
       { 
    
       $data = array(
       'id' => $last_inserted_id,
       'image_name' =>"images/".$uniqueimg,
                     );
       $this->insert($data);
       }

       public function updateBookImages( $image_name,  $id)
       {
 
       $data = array(
       'image_name' => $image_name,
     
       );
       $this->update($data, 'id = '. (int)$id);
       }

       public function deleteBookImages($id)
       {
       $this->delete('id =' . (int)$id);
       }

}

