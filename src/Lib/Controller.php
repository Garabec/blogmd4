<?php


namespace Lib;


class Controller {
    
    protected $data;
    protected $models=array();
    protected $params;
    
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
        
    }
    
    
    
    
}