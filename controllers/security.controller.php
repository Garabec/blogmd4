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
    
 
 
 public function admin_edit_form_userAction(){
     
     
    $id=$this->params; 
    
    
     
    $this->data['user']=$this->model['user']->findUser($id[0]) ;
     
    
     
     
 }
 
 
 public function admin_user_save_editAction(){
    
    
   
    
    
    $form= new UserFormEdit;
    
    
    
    
  if( $form->getRequest()->isPost()){
    
    
        if($form->isValid()){
            
          
          
          $user=new User;
         
              $user->getFromFormData($form);
              
             
                       $this->model['user']->save($user);
                  
    
    App::redirect("/admin/security/users");
         
         
         
      }
     }
    } 
 
 
 
 
 
public function admin_delete_userAction(){
       
       
       $id=$this->params;
       
      $this->data=$this->model['user']->deleteUser($id[0]);
      
      
      App::redirect("/admin/security/users");
       
   }  
 
 
 
 
    
    
}