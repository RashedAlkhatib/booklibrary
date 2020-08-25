<?php

class Application_Model_DbTable_Labels extends Zend_Db_Table_Abstract
{

    protected $_name = 'Labels';
 
    public function getLabels($id)     
    {
        $id = (int)$id;
        $row = $this->fetchRow('labelid = ' . $id);
        if (!$row) {
        throw new Exception("Could not find row $id");
        }
        return $row->toArray(); 


    }


       public function addLabels($label)
       { 
       $data = array(
       'Label' => $label,
  
                     );
       $this->insert($data);
       }

       public function updateLabels($id, $label)
       {
       $data = array(
       'Label' => $label,
 
       );
       $this->update($data, 'labelid = '. (int)$id);
       }

       public function deleteLabels($id)
       {
       $this->delete('labelid =' . (int)$id);
       }

}

