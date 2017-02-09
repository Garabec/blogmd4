<?php


namespace Lib;


class Controller {
    
    public $data;
    protected $models=array();
    protected $params;
    protected $container;
    
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
    
    
    public function __construct( $data=array()){
        
       $this->data=$data;
       $this->params=App::getRouters()->getParams();
       $this->repo_manager=new RepasitoryManager();
       $this->container=require(ROOT.DS.'src'.DS.'Lib'.DS.'Container.php');
    }
    
    
   public function render($data_render=array(),$path=null){
       
     if(is_null($path)){
         
        $route=App::getRouters();
       
            if(!$route){  throw new \Exception('Роутер не получен getDefaultPath') ;  };
       
                    $view_dir=strtolower(str_replace('Controller',"",$route->getController()));
       
                         $view_template=strtolower(str_replace('Action',"",$route->getAction())).'.html';
       
       
       $path=VIEW_DIR.DS.$view_dir.DS.$view_template;
        
        
        }  
       
       $data=$data_render; 
       
      // dump($data['book']);
       
            ob_start();
       
       require $path;
       
       $content=ob_get_clean();
       
           ob_start();
           
           require VIEW_DIR.DS.App::$routers->getRoute().'.html';
       
           echo  ob_get_clean();
       
       
   } 
    
}