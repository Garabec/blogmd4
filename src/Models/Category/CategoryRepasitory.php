<?php

namespace Models\Category;

use Lib\Request;
use Lib\DbPDO;
use Models\Category\Category;
use Models\Author\Author;
use Models\Comment\Comment;


class CategoryRepasitory{
    
    
    private $db;
    
    public function __construct(DbPDO $db){
     
    $this->db=$db;
     
    }
    
   
public function findAll(){
    
    $sql="select name from category";
    
    $result=$this->db->getConnectionDB()->query($sql);
    
    $categories=array();
    
    while($row=$result->fetch(\PDO::FETCH_ASSOC)){
        
        $category=new Category();
        
        $category->setName($row['name']);
        
        
        $categories[]=$category;
        
        
        
    }
    
    
   return $categories; 
    
    
    
}   
   
   
    
    
}