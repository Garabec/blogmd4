<?php

namespace Lib\OutputFormatter;

use Lib\OutputFormatterInterface;


class XmlFormatter implements OutputFormatterInterface{
    
 public function output($code,$data) {
     
   
  
   
   header('Content-type: aplication/xml');
   
   return xmlrpc_encode(
       
       [
        
        'code'=>$code,
        'data'=>$data
        
        ]
       
       );
       
 }
     
     
 }