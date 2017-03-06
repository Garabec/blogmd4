<?php

namespace Models\Post;



use Lib\Request;
use Lib\DbPDO;
use Models\Category\Category;
use Models\Author\Author;
use Models\Comment\Comment;

class PostRepasitory  {
    
    
    private $db;
    
    public function __construct(DbPDO $db){
     
    $this->db=$db;
     
    }
    
 public function getListCategoryPost($name_category ,$page=0) {
  
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
    
    
  public function getPost($id) {
      
      
      $sql="select p.id , p.body , p.title, p.category_id, a.username from  post p join author a on p.author_id=a.id   where p.id='{$id}'" ; 
        
        $result=$this->db->getConnectionDB()->query($sql);
        
          $row=$result->fetch(\PDO::FETCH_ASSOC);
          
          
        $category=new Category();
         
        $category_id=$row['category_id'];
        
        $sql="select name from category where id='{$category_id}'";
        
        $result2=$this->db->getConnectionDB()->query($sql);
        
        $row2=$result2->fetch(\PDO::FETCH_ASSOC);
        
        
        $category->setName($row2['name']);
           
          
         $author=new Author;
         
         $author->setUserName($row['username']);
         
         


    $sql="select*from `comment` where post_id='{$id}'" ; 
        
        $result=$this->db->getConnectionDB()->query($sql);
        
        $comments=array();
        
        while($row_com=$result->fetch(\PDO::FETCH_ASSOC)){
         
       
       $id_author_comment=$row_com['user_id'];
       
       
       
       $sql="select*from `user` where id='{$id_author_comment}'" ; 
       
       $result3=$this->db->getConnectionDB()->query($sql);
       
       $row_usr=$result3->fetch(\PDO::FETCH_ASSOC);
       
       
       
       $user_name=$row_usr['name'];
       
       
       
       $comment= new Comment;
       
       $comment->setId($row_com['id'])
        ->setBody($row_com['body'])
        ->setCreatedAt($row_com['created_at'])
        ->setPostId($row_com['post_id'])
        ->setLike($row_com['like'])
        ->setNotLike($row_com['notlike'])
        ->setUserId($row_com['user_id'])
        ->setAuthor($user_name);
               
               
        $comments[]=$comment;
        };  
        
     
        
        
         $post=new Post;
         $post->setId($row['id'])
              ->setTitle($row['title'])
              ->setBody($row['body'])
              ->setAuthor($author)
              ->setComments($comments)
              ->setCategory($category);
              
              
             
           
        
        
       
        
        
        return $post;
         
      
      
      
  }  
 
 
 public function countPost($category){
  
  $sql="select id from category  where name='{$category}'" ; 
        
        $result=$this->db->getConnectionDB()->query($sql);
        
          $row=$result->fetch(\PDO::FETCH_ASSOC);
  
       $id=$row['id'];
       
       
    $sql="select COUNT(*) as count from post  where category_id='{$id}'" ;    
       
    $result=$this->db->getConnectionDB()->query($sql);
        
          $row=$result->fetch(\PDO::FETCH_ASSOC);   
       
      $count = $row['count'];
      
     return $count;
  
 }   
   
   
 public function save(Post $post){
  
  $category=$post->getCategory();
 
 
 
 
 
 $sql=" select id from `category` where name='$category' ";
 
 $result=$this->db->getConnectionDB()->query($sql);
 
 $category=$result->fetch(\PDO::FETCH_ASSOC);
        
       
        
        $data=array(
              
              'title'=>$post->getTitle(),
              'body'=>$post->getBody(),
              'created_at'=>$post->getCreatedAt(),
              'category_id'=>$category['id'],
              
             );
        
        
      
        
        
             
               
       $id=(int)$post->getId();         
               
 
 $sql="update `post` set `title`=:title,`body`=:body,`created_at`=:created_at,`category_id`=:category_id where id='$id'" ;
 
 
 $result=$this->db->getConnectionDB()->prepare($sql);
     
     
     
     return $result->execute($data);
 
 
 }  
   

public function searchTitlePost($search){
 
 
 $sql ="SELECT * FROM post WHERE title LIKE '%$search%' LIMIT 5";
 
 
 $result=$this->db->getConnectionDB()->query($sql);
 
  $titles=array();
 
      while($row=$result->fetch(\PDO::FETCH_ASSOC)){
       
       
       $titles[]=$row['title'];
       
      }
 
 
 return $titles;
 
 
 
}

public function getCommentators($num){
 
 $num=(int)$num;
 
 $sql ="SELECT COUNT(*) as count , user_id FROM comment GROUP BY user_id ORDER BY count DESC LIMIT $num";
 
 
 
 $result=$this->db->getConnectionDB()->query($sql);
 
 
 
  $commentators=array();
 
      while($row=$result->fetch(\PDO::FETCH_ASSOC)){
       
       $user_id=$row['user_id'];
       
       $sql="select id , name from `user` where id=$user_id" ;
      

       $result3=$this->db->getConnectionDB()->query($sql);
       
      $row3=$result3->fetch(\PDO::FETCH_ASSOC);
      
     $commentators[]=$row3;
       
       
      }


 return $commentators;
 
 
 
 
 
}


public function getComments($id){
 
 
 $sql="select*from comment where user_id=$id order by `like` desc";
 

 
 $result=$this->db->getConnectionDB()->query($sql);
 
 $comments=array();
 
 while($row_com=$result->fetch(\PDO::FETCH_ASSOC)){
  
  $id_author_comment=$row_com['user_id'];
  $id_post=$row_com['post_id'];     
       
       $comment=new Comment;
       $sql="select*from `user` where id='{$id_author_comment}'" ; 
       
       $result3=$this->db->getConnectionDB()->query($sql);
       
       $row_usr=$result3->fetch(\PDO::FETCH_ASSOC);
       
       
       
       $user_name=$row_usr['name'];
       
       
       $sql="select title from `post` where id='{$id_post}'" ; 
       
       $result4=$this->db->getConnectionDB()->query($sql);
       
       $row_post=$result4->fetch(\PDO::FETCH_ASSOC);
       
       
       $post=(new Post)->setTitle($row_post['title']);
       
       $user_name=$row_usr['name'];
  
  
  
  $comment->setId($row_com['id'])
        ->setBody($row_com['body'])
        ->setCreatedAt($row_com['created_at'])
        ->setPostId($row_com['post_id'])
        ->setLike($row_com['like'])
        ->setNotLike($row_com['notlike'])
        ->setUserId($row_com['user_id'])
        ->setAuthor($user_name)
         ->setPost($post);
               
               
        $comments[]=$comment;
  
  
  
 }
 
 
 
 return $comments;
 
 
}   
  
public function getComment($id) {
 
 
$sql="select*from comment where id=$id";
 
 $result=$this->db->getConnectionDB()->query($sql); 
 


$row_com=$result->fetch(\PDO::FETCH_ASSOC);






$comment=new Comment;

$comment->setId($row_com['id'])
        ->setBody($row_com['body'])
        ->setCreatedAt($row_com['created_at'])
        ->setPostId($row_com['post_id'])
        ->setLike($row_com['like'])
        ->setNotLike($row_com['notlike'])
        ->setUserId($row_com['user_id']);
 
 
return $comment; 
 
 
} 
  
public function getTopPost($num){
 
 $num=(int)$num;
 
 $sql ="SELECT COUNT(*) as count , post_id FROM comment GROUP BY post_id ORDER BY count DESC LIMIT $num";
 
 
 
 $result=$this->db->getConnectionDB()->query($sql);
 
 
 
  $posts=array();
 
      while($row=$result->fetch(\PDO::FETCH_ASSOC)){
       
       $post_id=$row['post_id'];
       
       $sql="select id , title from `post` where id=$post_id" ;
      

       $result3=$this->db->getConnectionDB()->query($sql);
       
      $row3=$result3->fetch(\PDO::FETCH_ASSOC);
      
       $post=new Post;
         $post->setId($row3['id'])
              ->setTitle($row3['title']);
              
              
      
      
     $posts[]=$post;
       
       
      }


 return $posts;
 
 
 
 
 
 
 
}  
    
}  
    