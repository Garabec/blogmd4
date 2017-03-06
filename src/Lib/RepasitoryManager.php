<?php

namespace Lib;

class RepasitoryManager{
    
    
 private $repasitories=array();
 private $db_connection;
 
 
 public function __construct(DbPDO $db){
  
  $this->db_connection=$db;
  return $this;
  
 }
 
 
 public function set($key,$value){
     
   $repasitories[$key]=$value;  
     
 }
    
 
 public function has($key){
     
     
  return isset($repasitories[$key]) ;  
     
 }
 
 
 public function get($key){
     
     
     if($this->has($key)){
         
        return $repasitories[$key] ;
         
     }
     
  $path_repo_manager=MODEL_DIR.DS.ucfirst($key).DS.ucfirst($key)."Repasitory.php";
  
 
  
  
  if(!file_exists($path_repo_manager)){
   
   throw new \Exeption("$key.Repasitory not found");
   
  }
  
  $class='\\Models\\'.ucfirst($key).'\\'.ucfirst($key)."Repasitory";
  
  
  
 $repo_class= new $class($this->db_connection);
 
 $this->set($key,$repo_class);
 
  
 return $repo_class; 
     
     
 }
    
    
}