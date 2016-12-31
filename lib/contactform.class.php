<?php

class ContactForm{
    
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
        
        
        
        return $this->data['name']!="" && $this->data['email']!="" && $this->data['message']!="";
        
    }
    
    
    public function getData(){
        
        
      return $this->data;  
        
        
    }
    
    
    
    
}