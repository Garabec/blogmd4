<?php

namespace Lib;

class FormatterFactory{
    
    
    
 public static function create($formate){
     
     
     $formater_path='Lib\OutputFormatter\\'.ucfirst($formate).'Formatter';
     
     $class= new $formater_path();
     
     
     if(!class_exists($formater_path)){
         
         
      throw new Exception("Not exists path class formatter $formater_path ");   
         
         
     }
     
     
     return  $class;
     
     
 }
    
    
}