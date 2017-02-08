<?php

namespace Lib;


use Lib\Event;

class TestEvent{
    
 public function dataView(Event $event){
     
     
    $controller = $event->getSubject();
     
    
    $controller->data['test']='Good'; 
     
     
 }   
    
    
    
    
}