<?php

namespace Controllers;

use Lib\Controller;
use Lib\Pagination;
use Lib\App;
use Lib\Request;

//use Symfony\Component\HttpFoundation\Request;
use Lib\ExportServicePDF;
use Lib\ExportServiceExel;
use Lib\PDF;
use Lib\Session;
use Lib\Cart;
use Lib\Event;

use Models\Book\Book;
use Models\Book\BookRepasitory;
use Models\Book\BookFormEdit;
use Models\Style\StyleRepasitory;

class BookController extends Controller {
  
  
  public function __construct($data=array()){
    
    
    parent::__construct($data);
    
    
    
    $this->model['book']=$this->repo_manager->get('Book');
    $this->model['style']=$this->repo_manager->get('Style');
    
  }
  
  public function getSubject(){
      
      return $this;
  }
  
  
    public function indexAction(){
      
      
      $this->data['test']='Bed';
      
      $dispatcher = App::$dispatcher;
      
      $dispatcher->dispatch('data.view', new Event($this));
      
      
      
    }
    
    public function listAction(){
        
     
      
      $params=$this->params; 
      
      $page=isset($params[1])? (int)$params[1]:1;
      
      
     if($page) { $currentPage=$page ;} else {$currentPage=$page=1;};
      
      
      
      $perPage=24;//todo config
      
      $countItems= (int)$this->model['book']->countBook();
      
      
      
      $this->data['pagination']= (new Pagination($countItems,$perPage,$currentPage))->buttons;
      
     
        
      $this->data['book']=$this->model['book']->getListBook($action_sort="up",$num_column_sort=1,$page-1,$perPage) ;  
      
        
    }
    
    
    public function viewAction(){
        
     $params=$this->params; 
     
     $alias=isset($params[0])?strtolower($params[0]):null;
        
    
        
      $this->data=$this->model['book']->getIdBook($alias); 
      
      
     
        
    }
    
    
    
   public function  admin_listAction(){
       
     
        
        
      $params=$this->params; 
      
      
      
       if(($params[0]=='up'||$params[0]=='down')) 
       {
           
         
        
         
         $page=isset($params[3])? (int)$params[3]:1;
         
         $action_sort=isset($params[0])? (string)$params[0]:'up';
         $num_column_sort=isset($params[1])? (int)$params[1]:1; 
         
         
        }
        
       
        else{
          
           
         $page=isset($params[1])? (int)$params[1]:1; 
         $action_sort="up" ;
         $num_column_sort=1; 
         
        };
      
     
      //die;
      
      if($page) { $currentPage=$page ;} else {$currentPage=$page=1;};
      
      
      
      $perPage=24;//todo config
      
      $countItems= (int)$this->model['book']->countBook();
      
      
      
      $this->data['pagination']= (new Pagination($countItems,$perPage,$currentPage))->buttons;
      
     
        
      $this->data['book']=$this->model['book']->getListBook($action_sort,$num_column_sort,$page-1,$perPage) ;  
      
     
     
     
     
     
     
     
     
     
     
        
      //   if($this->params){  $params_sort=$this->params;
        
      //   $this->data=$this->model['book']->getListBook($params_sort[0],$params_sort[1]);}
      
      // else{$this->data=$this->model['book']->getListBook();}; 
     
     
     
     
     
     
     
     
   }
    
    
  public function admin_edit_form_bookAction(){
    
    $params=App::getRouters()->getParams(); 
     
     $alias=isset($params[0])?strtolower($params[0]):null;
        
      $this->data['book']=$this->model['book']->getIdBook($alias); 
      
      $this->data['styles']=$this->model['style']->findAll();
      
      $this->data['book_style']=$this->data['book']->getStyle()->getName();
      
      //$this->$data['book']->getStyle()->getName();
    
    //   var_dump($this->data['book']->getStyle()->getName());
    //   die;
    
    
  }  
    
 
 
  public function admin_edit_bookAction(){
    
    
   
    
    
    $form= new BookFormEdit;
    
  if( $form->getRequest()->isPost()){
    
    
        if($form->isValid()){
          
          $book=new Book;
         
              $book->getFromFormData($form);
              
                   if($book->getId()){
              
                       $this->model['book']->save($book);
                    
                                      } else { 
                                          
                                          $this->model['book']->add($book);
                                          
                                       };
    
    
         
         
         
      } else 
      
      { 
         
          
              $book=new Book;
         
              $book->getFromFormData($form);
          
          
       if($book->getId()){
      
          Session::setFlash("Fill the fields");
      
          App::redirect("/admin/book/edit_form_book/".$book->getId());
      
       }
       else {
           
           Session::setFlash("Fill the fields");
      
           App::redirect("/admin/book/add");
      
      
            };
       
       
       
       
       
       
      
     }
     
     
     
     
     if($book->getId()){
     
         App::redirect($form->getData('uri_back')); 
         
     } else {
         
         $perPage=24; //todo config
      
         $countItems= (int)$this->model['book']->countBook();
         
         $page=ceil($countItems/$perPage);
         
         
        App::redirect("/admin/book/list?page=$page");
         
     }
     
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
 
 
 public function admin_pdfAction( ){
     
     $pdf= new PDF;
     $pdf_service= new ExportServicePDF($pdf);
      
    $countBook= (int)$this->model['book']->countBook();
    
       $this->data['book']=$this->model['book']->getListBook($action_sort="up",$num_column_sort=1,0,$countBook) ;
       
              $file_name="file_".time().".pdf" ;
     
    ob_end_clean();
    
    
    $pdf_service->createDocument($file_name,$this->data['book']);
    
    $pdf_service->download();
    
    
     
    }
 
 public function admin_excelAction(){
     
     $objPHPExcel = new \PHPExcel();
     
     $exel_service=new ExportServiceExel($objPHPExcel);
     
     $countBook= (int)$this->model['book']->countBook();
    
       $this->data['book']=$this->model['book']->getListBook($action_sort="up",$num_column_sort=1,0,$countBook) ;
       
              $file_name="file_".time().".xls" ;
     
    ob_end_clean();
     
     $exel_service->createDocument($file_name,$this->data['book']);
     
     $exel_service->download();
     
 }
 
 
 public function admin_addAction(){
     
     
      $this->data['book']=new Book;
      
      $this->data['styles']=$this->model['style']->findAll();  
      
     
      
     
   return VIEW_DIR."/book/admin_edit_form_book.html";  
     
 }
 

     public function add_product_cartAction(){
     
    
         $parm=$this->params;
    
         $cart=(new Cart)->addProduct($parm[0]);
    
    
         App::redirect($_SERVER['HTTP_REFERER']);
    
    
    }


     public function view_cartAction(){
    
          $cart=(new Cart)->getProducts(true);
          
         
    
    
        $this->data['books']=$this->model['book']->getCartProduct($cart);
    
    
        
    
    
    
      }


     public function clear_cartAction(){
         
         
         $cart=(new Cart)->clear();
         
       App::redirect("/book/list/");  
         
     }


    public function delete_product_cartAction(){
        
        
        
        $parm=$this->params;
    
         $cart=(new Cart)->deleteProduct($parm[0]);
    
    
         App::redirect("/book/view_cart");
        
        
        
    }

    
}