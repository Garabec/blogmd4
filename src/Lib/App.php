<?php

namespace Lib;

use Symfony\Component\EventDispatcher\EventDispatcher;

use Lib\Request;


class App {
    
    public  $routers;
    public  $request;
    
    public  $dispatcher ;
    
    public  $db;
    
    
    
    
    
    
    
    
    
    public  function getRouters(){
        
    return $this->routers;    
        
        
    }
    
    
    
    
    public  function run( Request $request){
        
        
        $this->request=$request;
        $this->routers=new Router( $this->request);
        
        
        $this->request=$this->routers->request;
        
  
   
  //==============create controller -> action================  
  
     $controller= 'Controllers\\'.$this->routers->getController();
     
        $action=$this->routers->getAction();
     
     
   
     
     
          $controller_object = new $controller();
          
          
          $layout=$this->routers->getRoute_Layout();
          
         
          
          $controller_object->setRouter($this->routers); 
      
      
  //==========================================================
  
      if(method_exists($controller_object,$action)) {
          
          
         $view_path=$controller_object->$action($this->request);
         
            //  $view_object=new View($controller_object->getData(),$view_path);
         
            //       $content=$view_object->render();
         
                                                   }  else {
          
       throw new \Exception(" Нет метода $action в объекте $controller") ;  
          
           }  
      
      
      
      
      
      
     
      
  //--------------проверка при входе в админ панель существует ли сессия админа    
      if($layout=='admin') {
          
          
        if(Session::get('role')!='admin') {$this->redirect("/security/login") ;   };
          
          
      }
      
     
      
    //   $layout_path=VIEW_DIR.DS."$layout.html";  
        
    //   $layout_object=new View(compact('content'),$layout_path);
      
    //  echo $layout_object->render();
        
        
        
    }
    
    
   public  function redirect($to) {
       
      header('Location:'.$to);
      
      die();
       
   }
    
    
};