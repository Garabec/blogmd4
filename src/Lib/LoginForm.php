<?php

namespace Lib;

class LoginForm{
    
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
        
        
        
        return  $this->data['name']!="" && $this->data['password']!="";
        
    }
    
    
    public function getData(){
        
        
      return $this->data;  
        
        
    }
      
    
    
    
    
    
}