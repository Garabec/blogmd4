<?php

namespace Lib;

class Request{
    
    
    protected $post;
    protected $server;
    protected $get;
    
    
    
    public function __construct(){
        
        
     $this->post=$_POST;   
     $this->server=$_SERVER;
     $this->get=$_GET;
        
    }
    
    
    public function getPost(){
        
        
     return isset ($this->post)? $this->post :null;  
        
        
        
    }
    
     public function get($key,$default=null){
        
        
     return isset ($this->get[$key])? $this->get[$key] :$default;  
        
        
        
    }
    
    public function getPostKey($key){
        
        
     return isset ($this->post[$key]) ? $this->post[$key] :null;  
        
        
        
    }
    
    
    
    public function getMethod() {
        
        
      return strtolower($this->server['REQUEST_METHOD']);  
        
        
    }
    
    
   public function isPost(){
       
       
    return $this->getMethod()=='post' ;  
       
       
       
   }
    
    
   public function getUri() {
    
    
    return $this->server['REQUEST_URI'];
    
   }
    
   
   public function mergeGET($params=array()) {
    
    $this->get+=$params;
    
      $_GET += $params;

    
    
   }
    
}