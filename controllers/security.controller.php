<?php



class SecurityController extends Controller {
    
    
    public function __construct($data=array()){
      
      parent::__construct($data);
      
      
      $this->model['user']=new UserRepasitory;
      
      
      
    }
    
    
    
    
    
  public function loginAction() {
        
        $form=new LoginForm;
        
        
        if($form->getRequest()->isPost()){
            
            if($form->isValid()){
                
                $user=new User;
                
                   $user->getFromFormData($form);
                
         $result=$this->model['user']->find($user);       
                
         if($result) {
             
          Session::setFlash("Sign in");   
             
             
         } else {
             
           Session::setFlash("User not found ");   
             
         }      
                
                
         } else {
             
             
             Session::setFlash("Fill the fields ");};
            
            
        }
        
    }
    
    
 
 
 public function registerAction(){
     
     $form=new RegisterForm;
        
        
        if($form->getRequest()->isPost()){
            
            if($form->isValid()){
                
                 if($form->matchPassword()){
                     
                     $user=new User;
                
                         $user->getFromFormData($form);
                     
                    
                    
        if(!$this->model['user']->findNameUser($user)){
            
           
                        
                       if($this->model['user']->addUser($user)) {Session::setFlash("User  registration  ");}
                       
                            else {Session::setFlash("Error registration  ");};
                       
                       
                       
                        
                        
                        
                        
                    } else { Session::setFlash("User found . You not registration  ");    };
                    
                    
                    
                     
                     
                 } else {Session::setFlash("Password not match  ");};
                
                
                
                
             
             
             
            
            
        } else {Session::setFlash("Fill the fields  ");};
        
    }
    
    
}
 
 
 public function admin_usersAction(){
     
     
     
    $this->data=$this->model['user']->getListUsers() ;
     
     
     
     
 }
    
    
    
}