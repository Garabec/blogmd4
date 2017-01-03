<?php


class Password {
    
    protected  $password;
    protected  $hash_password;
    protected  $salt;
    
    const  SALT_TEXT="Happy New Year";
    
    
public  function __construct($password_code,$salt_text=null){
    
  $this->password=$password_code;  
    
  $this->salt=md5(is_null($salt_text)?$this->SALT_TEXT:$salt_text) ;
  
  $this->hash_password=md5($this->salt.$this->password);
  
  
  
  
  
   
  return $this ;
    
    
}
    
    
    
public function getHashPassword(){
    
  return $this->hash_password;  
    
}    
    
    
    
}