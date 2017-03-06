<?php

namespace Controllers;

use Lib\Controller;

class ErrorController  extends Controller {
    
    
    
    
 public function __construct(\Exception $e) {
     
     
     $this->data['error']=$e->getMessage();
     
  }  
    
    
 public function errorAction() {
     
     
     
     $this->render($this->data,VIEW_DIR."/error/error.html");
     
     
 }  
    
    
  
    
    
    
}