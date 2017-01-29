<?php

namespace Models\Book;

use Lib\Request;

class BookFormEdit{
    
    
    protected $data=array();
    
    
    protected $request;
    
    
    
    public function __construct(){
       
       $this->request=new Request; 
       
       $this->data=$this->request->getPost();
        
    
        
    }
    
    
    public function getRequest(){
        
        
     return $this->request;   
        
    }
    
    public function isValid(){
        
        
        
        return $this->data['title']!="" && $this->data['description']!="" && $this->data['price']!="";
        
    }
    
    
    public function getData($key=null){
        
      if(is_null($key)){
      
           return $this->data;
      } else 
            {return $this->data[$key];};
        
        
    }
    
    
    
    
    
    
    
}