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
       protected $routers;
       protected $params;
       
       public function getRoute()
    {
        return $this->router_layout;
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
     
     
       
//--------------получаем роуты--------------- 

     //$this->routers=Config::get('routers');
     
     
     $config = Yaml::parse(
    file_get_contents(dirname(dirname(__DIR__)).'/config/routers.yml')
);


    $this->routers=$config['routers'];




//var_dump($config1['routers']);
//die;
     
     
//================ищем совпадение с регуляркой ===================     
     foreach($this->routers as $uri_pattern=>$path ){
         
         if(preg_match("~^$uri_pattern$~",$this->uri)){
             
             
             
             
           $uri_path=preg_replace("~^$uri_pattern$~",$path,$this->uri); 
             
             
            $this->uri=$uri_path; 
             
         }
         
     }
     
//===============================================================     
     
     
     
     
     
     
//=================присваиваем значение по умолчанию=================     
     $this->Language=Config::get('default_language');
     $this->controller=Config::get('default_controller');
     $this->router_layout=Config::get('default_router');
     $this->action=Config::get('default_action');
     
//----------------разбиваем uri -----------------------------------     
     $uri_part=preg_split('/[\/\?\=]/',$this->uri);
     
//----------------присваиваем значения роутов шаблонов-----------     
     $router_layout=Config::get('routers_layout');

//----------------ищем если есть префиксы шаблонов админки или языкового перевода--------------     
     if(in_array(strtolower(current($uri_part)),array_keys($router_layout))){
         
       $this->router_layout=strtolower(current($uri_part));
       
           $this->method_prefix=isset($router_layout[$this->router_layout])?$router_layout[$this->router_layout]:'';
       
                array_shift($uri_part);
       
     }  elseif (in_array(strtolower(current($uri_part)),Config::get('language'))) {
         
         
         
       $this->Language=strtolower(current($uri_part));
       
        array_shift($uri_part); 
         
         
     }
    
//----------находим  контроллер , экшен , параметры --------   
    
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
    
//----------------------------------------------------------------------    
    
    
    
}

}