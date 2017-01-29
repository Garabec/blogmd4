<?php


namespace Lib;

class DB {
    
    
   protected $connection;
   
   
   
   public function __construct($host,$user,$password,$dbname){
       
     $this->connection=new mysqli($host,$user,$password,$dbname);
     
     if(mysqli_connect_error($this->connection)){
         
       throw new Exception('Not connection DB');  
         
         
     }
       
   }
   
   public function query($sql) {
       
       
       if(!$this->connection){
           
           
           return false;
       }
       
    $result=$this->connection->query($sql) ;
    
    
    
    if(is_bool($result)){
        
        return $result;
    }
       
    
    $data=array();
    
    while($row=mysqli_fetch_assoc($result)){
        
       $data[]=$row; 
        
    }   
      
      
   return $data;    
       
   }   
       
       
   public function escape($str){
       
     return mysqli_escape_string($this->connection,$str);  
       
       
       
   }
    
}