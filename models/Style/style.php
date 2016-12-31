<?php

class Style{
    
    protected $id;
    protected $name;
    
    
    public function getId(){
        
     return  $this->id;  
        
        
    }
    
    public function setId($id){
        
      $this->id=$id;
      
      return $this;
        
    }
   
   
    
    public function setName($name){
        
      $this->name=$name;  
        
      
      return $this;  
    }
    
    
    public function getName(){
        
      return $this->name;  
        
    }
    
    
    
    
}