<?php

namespace Models\Comment;

use Lib\Request;
use Lib\DbPDO;
use Models\Category\Category;
use Models\Author\Author;
use Models\Comment\Comment;


class CommentRepasitory{
    
    
    private $db;
    
    public function __construct(DbPDO $db){
     
    $this->db=$db;
     
    }
    
    
    public function add(Comment $comment){
        
        $id_post=$comment->getPost()->getId();
        
       // dump($id_post);
         
              
 
 $data=array(
              
             // 'author'=>$comment->getAuthor(),
              'body'=>$comment->getBody(),
              'post_id'=>$id_post,
              'created_at'=>$comment->getCreatedAt()->format('Y-m-d H:i:s'),
              'user_id'=>$comment->getUserId()
             );
      
               
 $sql="insert into `comment`(`body`,`post_id`,`created_at`,`user_id`) values(:body,:post_id,:created_at,:user_id)" ;
 
 
 
 
 $result=$this->db->getConnectionDB()->prepare($sql);
     
     
    
     
     return $result->execute($data);
 
 
 }
 
 
 public function getListComment($name_category ,$page=0) {
  
      if(is_null($page)){$page=0;};
     
     if($page){$page=($page-1)*5;};
        
        $sql="select*from category c join post p on c.id=p.category_id where name='{$name_category}' order by created_at desc limit {$page},5" ; 
        
       
       // $sql="select*from book where id='{$id}'" ;
        
        $result=$this->db->getConnectionDB()->query($sql);
        
      
        
        $category= new Category;
        $category->setName($name_category);
        $posts=array();
        
        
        
        
        
        while($row=$result->fetch(\PDO::FETCH_ASSOC)){
            
           $author=new Author;
           $author_id=$row['author_id']; 
           
           $sql="select username from author where id='{$author_id}'";  
           
           $result1=$this->db->getConnectionDB()->query($sql);
           $row_a=$result1->fetch(\PDO::FETCH_ASSOC);
           
           $author->setUserName($row_a['username']);
           
            
            
            
            
         $post=new Post;
         $post->setId($row['id'])
              ->setTitle($row['title'])
              ->setBody($row['body'])
              ->setCreatedAt($row['created_at'])
              ->setAuthor($author)
              ->setCategory($category);
              
          $posts[]=$post;    
             
         }   
        
        
        
        $category->setPosts($posts);
        
       
        
        return $category;
        
        
        }   
    
    
public function save(Comment $comment){
    
  
        
       // dump($id_post);
         
              
 
 $data=array(
              
             // 'author'=>$comment->getAuthor(),
              'body'=>$comment->getBody(),
              'post_id'=>$comment->getPostId(),
              'created_at'=>$comment->getCreatedAt(),
              'user_id'=>$comment->getUserId(),
              'like'=>$comment->getLike(),
              'notlike'=>$comment->getNotLike()
             );
      
        
        
      
        
        
             
               
       $id=(int)$comment->getId();         
               
 
 $sql="update `comment` set `body`=:body,`post_id`=:post_id,`created_at`=:created_at,`user_id`=:user_id,`like`=:like,`notlike`=:notlike where id='$id'" ;
 
 
 $result=$this->db->getConnectionDB()->prepare($sql);
     
     
     
     return $result->execute($data);
 
 
 
   
    
    
    
    
    
    
    
    
}    
    
public function getListComments($page) {
 
  if(is_null($page)){$page=0;};
     
     if($page){$page=($page-1)*5;};
        
        $sql="select*from comment order by created_at desc limit {$page},5" ; 
        
       
       // $sql="select*from book where id='{$id}'" ;
        
        $result=$this->db->getConnectionDB()->query($sql);
        
        $comments=array();
 
 while($row_com=$result->fetch(\PDO::FETCH_ASSOC)){

$id=$row_com['user_id'];

$sql="select name from user where id={$id}";
$result2=$this->db->getConnectionDB()->query($sql);
$row_user=$result2->fetch(\PDO::FETCH_ASSOC);



$comment=new Comment;

$comment->setId($row_com['id'])
        ->setBody($row_com['body'])
        ->setCreatedAt($row_com['created_at'])
        ->setPostId($row_com['post_id'])
        ->setLike($row_com['like'])
        ->setNotLike($row_com['notlike'])
        ->setUserId($row_com['user_id'])
        ->setAuthor($row_user['name']);
 
 $comments[]=$comment;
 
 
}   



return $comments;

}

public function countComments(){
  
  
       
       
    $sql="select COUNT(*) as count from comment  " ;    
       
    $result=$this->db->getConnectionDB()->query($sql);
        
          $row=$result->fetch(\PDO::FETCH_ASSOC);   
       
      $count = $row['count'];
      
     return $count;
  
 }   

}