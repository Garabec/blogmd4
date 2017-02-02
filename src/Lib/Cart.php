<?php

namespace Lib;

class Cart{
    
   private $products;
   
   
public function __construct() {
    
  $this->products=Cookie::get('books')==null? array():unserialize(Cookie::get('books'));  
   
   return $this; 
}  
   
public function addProduct($id){
    
    
    $id=(int)$id;
    
    
   if(!in_array($id,$this->products)){
       
    array_push($this->products,$id) ;  
       
    } 
    
 Cookie::set("books",serialize($this->products));
 
}  
   
    
public function deleteProduct($id) {
    
   $key=array_search($id,$this->products);
   
   if($key!==false){
       
     unset($this->products[$key]) ; 
       
       
   }
    
    
  Cookie::set("books",serialize($this->products));  
    
    
}   
    
    
public function getProducts($for_sql = false)
    {
        if ($for_sql) {
            return implode(',', $this->products);
        }

        return $this->products;
    }

    
    
    
public function clear(){
    
    
  Cookie::delete('books');  
    
    
    
}    
    
   
    
    
    
}