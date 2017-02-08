<?php

namespace Lib\OutputFormatter;

use Lib\OutputFormatterInterface;


class JsonFormatter implements OutputFormatterInterface{
    
 public function output($code,$data) {
     
   
   header('Content-type: aplication/json');
   
   return json_encode(
       
       [
        
        'code'=>$code,
        'data'=>$data
        
        ]
       
       );
   
    
    
 }  
    
    
    
}