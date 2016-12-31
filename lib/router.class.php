<?php

class Router{
    
       protected $uri;
       protected $controller;
       protected $action;
       
       protected $language;
       protected $method_prefix;
       protected $router;
       protected $params;
       
       public function getRoute()
    {
        return $this->router;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->Language;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }
    
    
    public function __construct($uri){
        
     $this->uri=urldecode(trim($uri,'/')) ;
     
     $this->Language=Config::get('default_language');
     $this->controller=Config::get('default_controller');
     $this->router=Config::get('default_router');
     $this->action=Config::get('default_action');
     
     
     $uri_part=preg_split('/\//',$this->uri);
     
     
     $routers=Config::get('routers');
     
     if(in_array(strtolower(current($uri_part)),array_keys($routers))){
         
       $this->router=strtolower(current($uri_part));
       
       $this->method_prefix=isset($routers[$this->router])?$routers[$this->router]:'';
       
       array_shift($uri_part);
       
     }  elseif (in_array(strtolower(current($uri_part)),Config::get('language'))) {
         
         
         
       $this->Language=strtolower(current($uri_part));
       
        array_shift($uri_part); 
         
         
     }
    
    
    
    if(count($uri_part)){
        
        
        if(current($uri_part)){
            
         $this->controller=strtolower(current($uri_part));   
            
           array_shift($uri_part) ;
        }
        
        if(current($uri_part)){
            
         $this->action=strtolower(current($uri_part));   
            
           array_shift($uri_part) ;
        }
        

        $this->params=$uri_part;
        
        


        
        
    }
    
    
    
    
    
}

}