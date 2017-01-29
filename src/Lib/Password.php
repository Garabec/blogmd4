<?php

namespace Lib;

class Password {
    
    protected static $password;
    protected static $hash_password;
    protected static $salt;
    protected static $default_salt="Happy New Year";
    
    

    
    
    
public static function getHashPassword($password_code,$salt_text=null){
  
  self::$password=$password_code;  
  
  self::$salt=md5(is_null($salt_text)?self::$default_salt:$salt_text) ;
  
  self::$hash_password=md5(self::$salt.self::$password);
  
  return self::$hash_password;  
    
}    
    
    
    
}