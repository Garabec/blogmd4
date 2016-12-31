<?php

class View {
    
    protected $data;
    protected $path;
    
    
    
    
    public static function getDefaultPath(){
        
       $route=App::getRouters();
       
       if(!$route){
           
        throw new Exception('Роутер не получен getDefaultPath') ;  
           
       }
       
       $view_dir=$route->getController();
       
       $view_template=$route->getMethodPrefix().$route->getAction().'.html';
       
       
       return VIEW_DIR.DS.$view_dir.DS.$view_template;
       
       
        
        
        
    }
    
    
    
    
    
    public function __construct($data=array(),$path=null){
        
       if(!$path){
           
          $path= self::getDefaultPath();
           
        } 
        
        
      $this->data=$data;
      $this->path=$path;
        
      }
    
    
    public function render(){
        
        $data=$this->data;
        
        ob_start();
        
        require $this->path;
        
        $content=ob_get_clean();
        
        return $content;
        
        
        
    }
    
    
    
}