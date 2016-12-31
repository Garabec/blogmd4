<?php



class RegisterForm{
    
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
        
        
        
        return  $this->data['email']!="" && $this->data['password']!="" && $this->data['confirm_password'];
        
    }
    
    
    public function matchPassword(){
        
        
     return $this->data['password']==$this->data['confirm_password'];  
        
    }
    
    
    public function getData(){
        
        
      return $this->data;  
        
        
    }
      
    
    
    
    
    
}