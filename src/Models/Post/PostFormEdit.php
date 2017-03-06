<?php

namespace Models\Post;
use Lib\Request;

class PostFormEdit{
    
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
        
        
        
        return $this->data['title']!="" &&  $this->data['body']!="";
        
    }
    
    
    public function getData(){
        
        
      return $this->data;  
        
        
    }
    
    
    
    
}