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
    
    
    
    
}