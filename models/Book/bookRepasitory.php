<?php



class BookRepasitory extends Model {
    
    
    public function getListBook($action_sort="up",$num_column_sort=1 ,$page=0,$perPage=10){
     
     
     var_dump($page);
     
     
     $view_page_books=$page*10;
     
     $sql=$this->sortBook($action_sort,$num_column_sort)." limit $view_page_books,$perPage";
     
      
      
      
      
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
    
  
   
public function sortBook($action,$num_column) {
 
 
 if($action=="down") { $sort="desc";} else { $sort="asc";};
 
 switch($num_column){
  
  case 1: $column="book_id"; break;
  case 2: $column="book_title";break;
  case 3: $column="book_description";break;
  case 4: $column="book_price";break;
  case 5: $column="book_is_active";break;
  case 6:$column="style_name";break;
  
  };
 
 
 $sql="select b.id as book_id ,b.title as book_title ,b.description as book_description ,b.price as book_price,
      
      b.is_active as book_is_active,s.id as id_style ,b.style_id as book_style_id,s.name  as style_name from 
      
      
      book b join style  s on b.style_id=s.id order by `$column` $sort" ; 
      
      
      
      
      
      
      return $sql;
 
 
 
 
 
 
}  
   
   
   
public function countBook() {
 
 
 
$sql="select count(*) as count_books from book";


$result=$this->db->getConnectionDB()->query($sql);
 
 $count=$result->fetch(PDO::FETCH_ASSOC);
 
 
 $countBooks=$count["count_books"];
 
   return $countBooks;
 
 
 
 
 
 
}  
   
   
   
   
   
   
   
   
    
}