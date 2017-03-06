<?php


namespace Lib;




class Controller {
    
    public $data;
    protected $models=array();
    protected $params;
    protected $container;
    protected $layout;
    
    protected $repo_manager;
    
    
    
    
    
    
     public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->models;
    }
    
    public function getParams()
    {
        return $this->params;
    }
    
    
    
    public function setRouter( Router $router){
        
        
       $this->router=$router; 
        
    }
   
   
   public function getRouter(){
       
      return $this->router; 
       
   }
    
    public function __construct( $data=array()){
        
       $this->data=$data;
       
       
       
       $this->container=require(ROOT.DS.'src'.DS.'Lib'.DS.'Container.php');
       
       
    }
    
    
   public function render($data_render=array(),$path=null){
       
       
       
      $router=$this->getRouter();
      
      
      
       
       
     if(is_null($path)){
         
        
        
              $view_dir=strtolower(str_replace('Controller',"",$router->getRoute()->getController()));
       
                         $view_template=strtolower($router->getRoute()->getAction()).'.html';
       
       
      $path=VIEW_DIR.DS.$view_dir.DS.$view_template;
      
     
        
        
        }  
       
       $data=$data_render; 
       
      $active=strtolower($router->getRoute()->getAction());
      
       
            ob_start();
       
       require $path;
       
       $content=ob_get_clean();
       
       
       
           ob_start();
           
           require VIEW_DIR.DS.$router->getRoute_Layout().'.html';
       
           echo  ob_get_clean();
       
       
   } 
    
}