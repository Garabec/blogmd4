<?php

namespace Lib;


class Session {
    
    //public static $flash_message;
    
    
    public static function setFlash($message){
        
        
     //self::$flash_message=$message; 
     
     
     self::set('message',$message);   
        
        
    }
    
    
    public static function hasFlash(){
        
      
       
        
     //return !is_null (self::$flash_message) ;
     
     return self::has('message');
     
        
    }
    
    
    
    
    
    
    public  static function getFlash(){
     
     
     
      
      if(self::hasFlash()){
        
     echo self::get('message');
     
     
     
     self::delete_session('message');
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
   
   public static function delete_session ($key){
    
    if(self::has($key)) {
     
     unset($_SESSION[$key]);
     
    }
    
    
    
   }
    
  public static function destroy(){
   
   session_destroy();
   
   
  }
  
  
    
}