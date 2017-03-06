<?php

namespace Lib;

use Symfony\Component\Yaml\Yaml;

class Router{
    
       protected $uri;
       protected $controller;
       protected $action;
       
       protected $language;
       protected $method_prefix;
       protected $router_layout;
       protected $route;
       protected $routers;
       protected $params;
       public $request;
       
       
    
       
       
       
       
       public function getRoute_Layout()
    {
        return $this->router_layout;
    }

     public function getRoute()
    {
        return $this->route;
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
    
    
    public function __construct(Request $request){
        
       $this->request=$request;
       $uri=$request->getUri();   
       
       
        
        
     $this->uri=urldecode(rtrim($uri,'/')) ;
     
     
       
//--------------получаем роуты--------------- 

     
     
     
    $routers=require(dirname(dirname(__DIR__)).'/config/routers.php');
    
    


//=================присваиваем значение по умолчанию=================     
     $this->Language=Config::get('default_language');
     $this->controller=Config::get('default_controller');
     $this->router_layout=Config::get('default_router');
     $this->action=Config::get('default_action');
     $this->route=$routers['default'];
     
     
     
     
                      
                     
     
     
//================ищем совпадение с регуляркой ===================     
     foreach($routers as $route ){
         
         
           $pattern=$route->pattern;
         
         
         
              if(count($route->params)){
                  
                  foreach($route->params as $temp_key=>$temp_value){
                   
                  
                        $route->pattern=str_replace("{{$temp_key}}","($temp_value)",$route->pattern);
                   
                    }
                   } 
                   
                           if(preg_match("~^$route->pattern$~",$this->uri, $matches)){
             
                       array_shift($matches);
             
             $params=$matches;
                        
                           $this->route=$route;
                         
              
              //--------------------контроллер и экшн-------------------    
             
                     $this->controller=$route->controller;
                     
                     $this->action=$route->action.'Action';
                     
                     
                     
           
             
                     //$params =preg_split('/[\/\?\=\#]/',$matches,-1,PREG_SPLIT_NO_EMPTY);
                     
                     
         //-------------------вытягуем параматры если есть------------- 
         
                     if(count($params)){
                         
                     
                     $this->params=$params;
                     
                     $this->request->mergeGET(['params'=>$params]);
                     
                    
                     
                     };
     
     
    
                     //----------------присваиваем значения роутов шаблонов-----------     
                     $router_layout=Config::get('routers_layout');
                      
                      
                      
                     
                    //----------------ищем если есть роуты шаблонов вывода--------------
                     
                     $uri_part=preg_split('/[\/\?\=\#]/',$this->uri,-1,PREG_SPLIT_NO_EMPTY);
                     
                     if(in_array(strtolower(current($uri_part)),array_keys($router_layout))){
         
                         $this->router_layout=strtolower(current($uri_part));
       
                        }
              }
         
     }
     
//===============================================================     
     
        
     
     
     
     

     
  
    
    
    
}

}