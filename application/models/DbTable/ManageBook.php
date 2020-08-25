<?php

class Application_Model_DbTable_ManageBook extends Zend_Db_Table_Abstract
{

    protected $_name = 'Book';
    protected  $_primary ='id';
 
    public   $where  ;
    public $limit;
    public $start;
 
    public function getManageBook( )     
    {
   
        $row = $this->fetchAll( $this->where,"id",$this->limit,$this->start) ;
        if (!$row) {
        throw new Exception("Could not find row $this->where");
        }
        return $row; 


    }


       public function addManageBook($title, $description,$Bauthor_explode)
       { 
 
      
       $data = array(
       'title' => $title,
       'description' => $description,'authorid' => $Bauthor_explode,
                     );
      return $this->insert($data);
       }

       public function updateManageBook( $title,$description,$authorid,$id)
       {
      
       $data = array(
       'title' => $title,
       'description' => $description, 'authorid' => $authorid,
       );
       $this->update($data, 'id = '. (int)$id);
       }

       public function deleteManageBook($id)
       {
       $this->delete('id =' . (int)$id);
       }


    function where($array,$auid,$titel){
        $array = implode(",",$array);
        $test=array($array,$titel,$auid);
        
     if($array!='' &&  $auid !='' && $titel !=''){
        $test=substr($titel, -1);
        $this->where="labelid IN (".$array.")  && (authorid='$auid'  ) && (title LIKE '$titel[0]%$test' && title LIKE'$titel[0]%' && title LIKE'$test%' )  
         "; 
     
     } else if($array!='' &&  $auid !='' ){
        $this->where="labelid IN (".$array.")  && (authorid='$auid'  )    
        "; 
    }
    
    else if(  $auid !='' && $titel !=''){
        $test=substr($titel, -1);
        $this->where=" (authorid='$auid' ) && (title LIKE '$titel[0]%$test' && title LIKE'$titel[0]%' && title LIKE'$test%' )   
        "; 
    }else if($array!='' && $titel !=''){
        $test=substr($titel, -1);
        $this->where="labelid IN (".$array.")  && (title LIKE '$titel[0]%$test' && title LIKE'$titel[0]%' && title LIKE'$test%')  
        "; 
    }else if(  $titel !=''){
        $test=substr($titel, -1);
        $this->where=" (title LIKE '$titel[0]%$test' && title LIKE'$titel[0]%' && title LIKE'$test%' )   
        "; 
     
    }else if( $auid !=''  ){
        $this->where=" (authorid='$auid' )  
        "; 
    }else if($array!=''  ){
        $this->where="labelid IN (".$array.")   
        "; 
    }else{
        $this->where="id !=''   
         "; 
    }
  
    return $this->where;
    }

 
      
}

