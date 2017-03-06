<?php


namespace Models\User;

use Lib\Request;

class UserFormEdit{
    
    
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
        
        
        
        return $this->data['name']!="" && $this->data['role']!="";
        
    }
    
    
    public function getData(){
        
        
      return $this->data;  
        
        
    }
    
}