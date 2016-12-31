<?php

class BookController extends Controller {
  
  
  public function __construct($data=array()){
    
    
    parent::__construct($data);
    
    $this->model=new BookRepasitory;
    
    
  }
  
  
    
    
    public function indexAction(){
        
        
        
      $this->data=$this->model->getListBook() ; 
      
        
    }
    
    
    public function viewAction(){
        
     $params=App::getRouters()->getParams(); 
     
     $alias=isset($params[0])?strtolower($params[0]):null;
        
      //echo 'PageController -> indexAction' ; 
        
      $this->data=$this->model->getIdBook($alias); 
      
      
     
        
    }
    
    
    
   public function  admin_indexAction(){
     
     
     $this->data=$this->model->getListBook() ;
     
     
   }
    
    
}