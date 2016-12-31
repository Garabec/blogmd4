<?php


class Session {
    
    protected static $flash_message;
    
    
    public static function setFlash($message){
        
        
     self::$flash_message=$message;   
        
        
        
    }
    
    
    public static function hasFlash(){
        
        
     return !is_null (self::$flash_message) ;
        
    }
    
    
    
    
    
    
    public  static function getFlash(){
      
      if(self::hasFlash()){
        
     echo self::$flash_message;
     
     self::$flash_message=null;
      } ;   
        
        
    }
    
    
   public static function start() {
       
       
       session_start();
       
   }
    
   public static function set($key,$value) {
       
     $_SESSION[$key]=$value;  
       
       
   }
    
   
   public static function get($key){
       
    if(self::has($key)) { return  $_SESSION[$key];   };  
       
       
   }
   
   
   public static function has($key){
       
     return isset( $_SESSION[$key] ); 
       
       
   }
   
   
    
    
}