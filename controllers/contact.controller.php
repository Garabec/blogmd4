<?php

class ContactController extends Controller{
    
    
    public function __construct($data=array()){
      
      parent::__construct($data);
      
      
      $this->model=new MessageRepasitory;
      
      
      
    }
    
    
    
    
    public function indexAction(){
      
     $form=new ContactForm;
     
     
     if($form->getRequest()->isPost()){
       
        if($form->isValid()){
          
              $message=new Message;
              
                $message->setDataFromForm($form);
                
                
                
          if($this->model->save($message)){
        
                Session::setFlash('Sent message');
        
        
             }else{ Session::setFlash('No sent message');};
       
       
     }else{ Session::setFlash('Fill the fields');};
         
     
     
     
     
     }
    
    }
    
    public function viewAction(){
        
      $this->data['contact']='Views ContactController->viewAction';
      
     //echo "ContactController->indexAction" ;
        
    }
    
   
   public function admin_messageAction(){
       
      $this->data=$this->model->getListMessage();
       
   }
   
    
    
}