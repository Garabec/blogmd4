<?php 


namespace Lib;


class Response{
    
    private $code;
    private $data;
    private $formater;
    
    public function __construct($code,$data,OutputFormatterInterface $formater) {
        
        http_response_code($code);
        $this->code=$code;
        $this->data=$data;
        
        $this->formater=$formater;
        
        
    }
    
    
    
   public function  send(){
       
       
       
        
        
       echo $this->formater->output($this->code,$this->data);
       die;
        
        
        
    }
    
    
    
    
    
}