<?php

namespace Lib;

class RepasitoryManager{
    
    
 private $repasitories=array();
 
 
 public function set($key,$value){
     
   $repasitories[$key]=$value;  
     
 }
    
 
 public function has($key){
     
     
  return isset($repasitories[$key]) ;  
     
 }
 
 
 public function get($key){
     
     
     if($this->has($key)){
         
        return $repasitories[$key] ;
         
     }
 }
    
    
}