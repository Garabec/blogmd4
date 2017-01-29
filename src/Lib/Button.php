<?php

namespace Lib;

class Button{
    
   public $page;
   public $IsActive;
   public $text;
   
   
   public function __construct($page,$IsActive,$text=null){
       
    $this->page=$page;
    $this->IsActive=$IsActive;
    if(is_null($text)){ $this->text=$page;} else {$this->text=$text;};
    
       
   }
   
   
   public function Text(){
       
       return $this->text;
   }
   
   
   public function Active(){
       
       $this->IsActive=true;
   }
    
   public function  deActive(){
       
       $this->IsActive=false;
   }
    
    
}