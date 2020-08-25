<?php

class Application_Model_DbTable_Books extends Zend_Db_Table_Abstract
{

    protected $_name = 'get_book';
    protected  $_primary ='id';
 
    public   $where  ;
    public $limit;
    public $start;
 
    public function getBook( )     
    {
   
        $row = $this->fetchAll( $this->where,"id",$this->limit,$this->start) ;
        if (!$row) {
        throw new Exception("Could not find row $this->where");
        }
        return $row; 


    }


       public function addBook($artist, $title)
       { 
       $data = array(
       'artist' => $artist,
       'title' => $title,
                     );
       $this->insert($data);
       }

       public function updateBook($id, $artist, $title)
       {
       $data = array(
       'artist' => $artist,
       'title' => $title,
       );
       $this->update($data, 'id = '. (int)$id);
       }

       public function deleteBook($id)
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

