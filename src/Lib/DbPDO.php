<?php

namespace Lib;


class DbPDO{
    
    
    protected $connection;
    
 public function __construct($host,$user,$password,$dbname) {
     
    $this->connection= new \PDO("mysql:host=$host;dbname=$dbname",$user,$password); 
    
    $this->connection->setAttribute( \PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION ); 
     
      }  
    
  
 public function getConnectionDB() {
     
    return $this->connection; 
     
 }
  
  
  
  public function query($sql){
      
    if(!$this->connection){
           
           
           return false;
       }
       
    $result=$this->connection->query($sql) ;
    
    
       
    
    $data=array();
    
    while($row=$result->fetch(\PDO::FETCH_ASSOC)){
        
       $data[]=$row; 
        
    }   
      
      
   return $data;    
         
      
      
      
      
      
      
  }
  
  
 public function escape($str){
       
     return $this->connection->quote($str); 
     
    
}  
  
  
    
    
}