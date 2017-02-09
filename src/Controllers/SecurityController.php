<?php

namespace Controllers;

use Lib\Controller;
use Lib\LoginForm;
use Models\User\User;
use Models\User\UserFormEdit;
use Lib\RegisterForm;
use Lib\App;
use Lib\Session;

use Models\User\UserRepasitory;

class SecurityController extends Controller {
    
    
    public function __construct($data=array()){
      
      parent::__construct($data);
    
    }
    
    
    
    
public function loginAction() {
        
        $form=new LoginForm;
        
        
        if($form->getRequest()->isPost()){
            
            if($form->isValid()){
                
                $user=new User;
                
                   $user->getFromFormData($form);
                
                $result=$this->container->get('repasitory_man')->get('User')->find($user);  
                
                
                
                
         if($result) {
             
              Session::setFlash("Sign in"); 
              Session::set('user',$user->getEmail());
              
              
              
              
              if($result['role']=='admin'){
                  
                Session::set('role',$result['role']); 
                  
                App::redirect('/admin');
                  
              };
             
         } else {
             
              Session::setFlash("User not found ");   
             
         }      
                
                
         } else {
             
             
             Session::setFlash("Fill the fields ");};
            
            
        }
        
        
      $this->render();  
        
    }
    
    

public function logoutAction(){
    
    
 $this->container->get('repasitory_man')->get('User')->logout();   
    
 App::redirect('/security/login');   
    
}





 
 
 public function registerAction(){
     
     $form=new RegisterForm;
      

        
        if($form->getRequest()->isPost()){
            
            if($form->isValid()){
                
                  if($form->matchPassword()) {


                          if($form->matchCaptcha(Session::get('captcha'))) {
                     
                          $user=new User;
                
                                $user->getFromFormData($form);
                     
                    
                    
                                      if(!$this->container->get('repasitory_man')->get('User')->findNameUser($user)){
            
           
                        
                                           if($this->container->get('repasitory_man')->get('User')->addUser($user)) {Session::setFlash("User  registration  ");}
                       
                       
                            else {Session::setFlash("Error registration  ");};
                       
                       
                       
                        
                        
                        
                        
                    } else { Session::setFlash("User found . You not registration  ");    };
                    
                    
                   }  else { Session::setFlash("Characters not matchn ");    };
                     
                     
                 } else {Session::setFlash("Password not match  ");};
                
                
                
                
             
             
             
            
            
        } else {Session::setFlash("Fill the fields  ");};
        
    }
  
  
   $this->render(); 
}
 
 
 public function admin_usersAction(){
     
     
     
    //$this->data=$this->model['user']->getListUsers() ;
     
     
   if($this->params){  $params_sort=$this->params;
        
        $this->data=$this->container->get('repasitory_man')->get('User')->getListUsers($params_sort[0],$params_sort[1]);}
      
      else{$this->data=$this->container->get('repasitory_man')->get('User')->getListUsers();};    
    
    
    
    
     $this->render($this->data); 
 }
    
 
 
 public function admin_edit_form_userAction(){
     
     
    $id=$this->params; 
    
    
     
    $this->data['user']=$this->container->get('repasitory_man')->get('User')->findUser($id[0]) ;
     
    
  $this->render($this->data);   
     
 }
 
 
 public function admin_user_save_editAction(){
    
    
   
    
    
    $form= new UserFormEdit;
    
    
    
    
  if( $form->getRequest()->isPost()){
    
    
        if($form->isValid()){
            
          
          
          $user=new User;
         
              $user->getFromFormData($form);
              
             
                       $this->container->get('repasitory_man')->get('User')->save($user);
                  
    
    
         
         
         
      }else {
          
           $user=new User;
         
           $user->getFromFormData($form);
          
          
          Session::setFlash('Fill the fields');
          
          App::redirect('/admin/security/edit_form_user/'.$user->getId());
          
          
          
          
      }
      
      
     }
     
     App::redirect("/admin/security/users");
     
    } 
 
 
 
 
 
public function admin_delete_userAction(){
       
       
       $id=$this->params;
       
      $this->data=$this->container->get('repasitory_man')->get('User')->deleteUser($id[0]);
      
      
      App::redirect("/admin/security/users");
       
   }  
 
 
 
 
    
    
}