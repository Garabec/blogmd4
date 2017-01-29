<?php

namespace Lib;



class Config {
    
    
    private static $setting=array();
    
    
    public static function set($key,$value){
        
        
     self::$setting[$key]=$value;   
        
    }
    
    
    public static function get($key){
        
        
    return isset(self::$setting[$key])?self::$setting[$key]:null;   
        
    }
    
    
    
    
}