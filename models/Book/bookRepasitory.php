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
    
    
}