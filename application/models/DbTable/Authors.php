<?php

class Application_Model_DbTable_Authors extends Zend_Db_Table_Abstract
{

    protected $_name = 'Authors';
 
    public function getAuthors($id)     
    {
        $id = (int)$id;
        $row = $this->fetchRow('author_id = ' . $id);
        if (!$row) {
        throw new Exception("Could not find row $id");
        }
        return $row->toArray(); 


    }


       public function addAuthors($author, $authoremail)
       { 
       $data = array(
       'author' => $author,
       'Email' => $authoremail,
                     );
       $this->insert($data);
       }

       public function updateAuthors($id, $author, $authoremail)
       {
       $data = array(
       'author' => $author,
       'Email' => $authoremail,
       );
       $this->update($data, 'authorid = '. (int)$id);
       }

       public function deleteAuthors($id)
       {
       $this->delete('authorid =' . (int)$id);
       }

}

