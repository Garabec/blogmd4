<?php

namespace Controllers;

use Lib\Controller;
use Lib\LoginForm;
use Models\User\User;
use Models\User\UserFormEdit;
use Lib\RegisterForm;
use Lib\App;
use Lib\Session;
use Lib\Request;
use Lib\Pagination;

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
              Session::set('user',$user->getName());
              
              
              
              
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
 
 
 public function admin_usersAction(Request $request){
     
     
     
    //$this->data=$this->model['user']->getListUsers() ;
     
     
   if(count($request->get('params'))){  $params_sort=$request->get('params');
        
        $this->data=$this->container->get('repasitory_man')->get('User')->getListUsers($params_sort[0],$params_sort[1]);}
      
      else{$this->data=$this->container->get('repasitory_man')->get('User')->getListUsers();};    
    
    
    
    
     $this->render($this->data); 
 }
    
 
 
 public function admin_edit_form_userAction(Request $request){
     
     
    $id=$request->get('params'); 
    
    
     
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
 
 
 
 
 
public function admin_delete_userAction(Request $request){
       
       
       $id=$request->get('params');
       
      $this->data=$this->container->get('repasitory_man')->get('User')->deleteUser($id[0]);
      
      
      App::redirect("/admin/security/users");
       
   }  
 
 public function admin_postAction(Request $request){
 
 $params=$request->get('params'); 
        
        $page=$request->get('page');
        
  if(!count($params)){$params[0]='News';};     
        
        
        $category_name=$params[0];
        
 
        $posts = $this->container->get('repasitory_man')->get('Post')->getListCategoryPost($category_name ,$page)->getPosts();
        
        if($page) { $currentPage=$page;} else {$currentPage=1;};
      
          $perPage=5;//todo config
      
                 $countItems= (int)$this->container->get('repasitory_man')->get('Post')->countPost($category_name);
      
      
      
                        $buttons= (new Pagination($countItems,$perPage,$currentPage))->buttons;
       
        

        return $this->render( array(
            'posts' => $posts,
            'buttons' => $buttons
        ));
 
 }
    
 
  public function admin_commentAction(Request $request){
      
      
        
        $page=$request->get('page');
        
    
        
        
        
        
 
        $comments = $this->container->get('repasitory_man')->get('Comment')->getListComments($page);
        
        if($page) { $currentPage=$page;} else {$currentPage=1;};
      
          $perPage=5;//todo config
      
                 $countItems= (int)$this->container->get('repasitory_man')->get('Comment')->countComments();
      
      
      
                        $buttons= (new Pagination($countItems,$perPage,$currentPage))->buttons;
       
        
    

        return $this->render( array(
            'comments' => $comments,
            'buttons' => $buttons
        ));
 
      
      
 

 
    
}


}