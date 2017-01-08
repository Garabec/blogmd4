<?php

class BookController extends Controller {
  
  
  public function __construct($data=array()){
    
    
    parent::__construct($data);
    
    $this->model['book']=new BookRepasitory;
    $this->model['style']=new StyleRepasitory;
    
  }
  
  
    public function indexAction(){
      
      
    }
    
    public function listAction(){
        
      $this->data=$this->model['book']->getListBook() ;  
      
        
    }
    
    
    public function viewAction(){
        
     $params=App::getRouters()->getParams(); 
     
     $alias=isset($params[0])?strtolower($params[0]):null;
        
      //echo 'PageController -> indexAction' ; 
        
      $this->data=$this->model['book']->getIdBook($alias); 
      
      
     
        
    }
    
    
    
   public function  admin_listAction(){
       
     
     
        
        if($this->params){  $params_sort=$this->params;
        
        $this->data=$this->model['book']->getListBook($params_sort[0],$params_sort[1]);}
      
      else{$this->data=$this->model['book']->getListBook();}; 
     
     
     
     
     
     
     
     
   }
    
    
  public function admin_edit_form_bookAction(){
    
    $params=App::getRouters()->getParams(); 
     
     $alias=isset($params[0])?strtolower($params[0]):null;
        
      $this->data['book']=$this->model['book']->getIdBook($alias); 
      
      $this->data['style']=$this->model['style']->findAll();
    
    
  }  
    
 
 
  public function admin_edit_bookAction(){
    
    
   
    
    
    $form= new BookFormEdit;
    
  if( $form->getRequest()->isPost()){
    
    
        if($form->isValid()){
          
          $book=new Book;
         
              $book->getFromFormData($form);
              
             
         
                  $this->model['book']->save($book);
                  
    
    
         
         
         
      } else 
      
      { 
         
          
              $book=new Book;
         
              $book->getFromFormData($form);
          
          
       
      
      Session::setFlash("Fill the fields");
      
      
      App::redirect("/admin/book/edit_form_book/".$book->getId());
      
      
     }
     
     
    App::redirect("/admin/book/list"); 
     
   } 
    
  }
 
 
 
 public function admin_delete_bookAction(){
       
       
       $id=$this->params;
       
      $this->data=$this->model['book']->deleteBook($id[0]);
      
      
      App::redirect("/admin/book/list");
       
   } 
 
 
 
 
 public function admin_sortAction(){
       
       
       $parm=$this->params;
       
      $this->data=$this->model['book']->sortBook($parm[0],$parm[1]);
      
      return VIEW_DIR."/book/admin_list.html";
      
     // App::redirect("/admin/book/list");
       
   } 
 
 
 
 
 
 
    
}