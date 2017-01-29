<?php

namespace Lib;

class Container {
    
    
 private $elements=array();
 
 
 public function set($key,$value){
     
    $elements[$key]=$value; 
     
 }
    
    
public function get($key) {
    
  if(isset($this->elements[$key])) {return  $this->elements[$key];}
  
     else {  throw new Exception("Not element container $key");};
    
    
}   
    
    
    
}