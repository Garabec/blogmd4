<?php

namespace Controllers;

use Lib\Controller;
use Models\Message\MessageRepasitory;
use Lib\ContactForm;
use Models\Message\Message;
use Lib\Session;
use Lib\App;




class ContactController extends Controller{
    
    
    public function __construct($data=array()){
      
      parent::__construct($data);
      
    }
    
    
    
    
 public function sendAction(){
      
     $form=new ContactForm;
     
     
     if($form->getRequest()->isPost()){
       
        if($form->isValid()){
          
              $message=new Message;
              
                $message->setDataFromForm($form);
                
                 if($this->container->get('repasitory_man')->get('Message')->save($message)){
        
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
       
      //$this->data=$this->model['message']->getListMessage();
      
      if($this->params){  $params_sort=$this->params;
        
        $this->data=$this->container->get('repasitory_man')->get('Message')->getListMessage($params_sort[0],$params_sort[1]);}
      
      else{$this->data=$this->container->get('repasitory_man')->get('Message')->getListMessage();}; 
      
       
   }
   
   public function admin_message_deleteAction(){
       
       
       $id=$this->params;
       
        $this->data=$this->container->get('repasitory_man')->get('Message')->deleteMessage($id[0]);
      
      
      App::redirect("/admin/contact/message");
       
   } 
    
}