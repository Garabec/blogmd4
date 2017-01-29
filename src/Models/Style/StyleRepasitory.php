<?php


namespace Models\Style;

use Lib\Model;


class StyleRepasitory extends Model {
    
    
    public function findAll(){
        
        $sql='select*from style' ; 
      
      
      $result=$this->db->getConnectionDB()->query($sql);
       
       $data=array();
    
       while($row=$result->fetch(\PDO::FETCH_ASSOC)){
        
        $style=new Style;
        
        
        $style->setId($row['id'])
                ->setName($row['name']);
                
         $data[]=$style; 
        
        }   
      
      
      
      
      return $data;
      
      
        
        
        
        
        
    }
    
    
    
    
    
    
    
    
    
}