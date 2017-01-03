<?php



class BookRepasitory extends Model {
    
    
    public function getListBook(){
      
      $sql='select b.id as book_id ,b.title as book_title ,b.description as book_description ,b.price as book_price,
      
      b.is_active as book_is_active,s.id as id_style ,b.style_id as book_style_id,s.name  as style_name from 
      
      
      book b join style  s on b.style_id=s.id order by b.id' ; 
      
      
      $result=$this->db->getConnectionDB()->query($sql);
       
       $data=array();
    
       while($row=$result->fetch(PDO::FETCH_ASSOC)){
        
        $book=new Book;
        $style=new Style;
        
        $style->setId($row['id_style'])
               ->setName($row['style_name']);
               
               
        
        $book->setId($row['book_id'])
             ->setTitle($row['book_title'])
             ->setDescription($row['book_description'])
             ->setPrice($row['book_price'])
             ->setIsActive($row['book_is_active'])
             ->setStyle($style);
        
         $data[]=$book; 
        
        }   
      
      
      
      
      return $data;
      
      
      
      
       
    }
    

    public function  getIdBook($id){
        
       $id=(int)$id;
        
        $sql="select b.id as book_id ,b.title as book_title ,b.description as book_description ,b.price as book_price,
      
      b.is_active as book_is_active,s.id as id_style ,b.style_id as book_style_id,s.name  as style_name from 
      
      
      book b join style  s on b.style_id=s.id  where b.id='{$id}' " ; 
        
        
       // $sql="select*from book where id='{$id}'" ;
        
        $result=$this->db->getConnectionDB()->query($sql);
        $row=$result->fetch(PDO::FETCH_ASSOC);
        
        $book=new Book;
        $style=new Style;
        
        $style->setId($row['id_style'])
               ->setName($row['style_name']);
        
        $book->setId($row['book_id'])
             ->setTitle($row['book_title'])
             ->setDescription($row['book_description'])
             ->setPrice($row['book_price'])
             ->setIsActive($row['book_is_active'])
             ->setStyle($style);
        
        
        return $book;
        
        
        
        
        
        
    }
    
   
public function save(Book $book) {
 
 
 
 $style=$book->getStyle();
 
 
 
 
 
 $sql=" select id from `style` where name='$style' ";
 
 $result=$this->db->getConnectionDB()->query($sql);
 
 $style=$result->fetch(PDO::FETCH_ASSOC);
        
       
        
        $data=array(
              
              'title'=>$book->getTitle(),
              'description'=>$book->getDescription(),
              'price'=>$book->getPrice(),
              'is_active'=>$book->getIsActive(),
              'style_id'=>$style['id']
             );
        
        
      
        
        
             
               
       $id=(int)$book->getId();         
               
 
 $sql="update `book` set `title`=:title,`price`=:price,`description`=:description,`is_active`=:is_active,`style_id`=:style_id where id='$id'" ;
 
 
 $result=$this->db->getConnectionDB()->prepare($sql);
     
     
     
     return $result->execute($data);
 
 
 
 
}  
   
   
   
   
   
public function deleteBook($id) {
    
    $id=(int)$id;
    
    
    $data=array(
        
       'id'=>$id 
        );
    
   $sql="delete from `book` where id=:id" ;
   
   $result=$this->db->getConnectionDB()->prepare($sql);
   
    
  return $result->execute($data);
  
 }   
    
  
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    
}