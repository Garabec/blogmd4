<?php

class MessageRepasitory extends Model{
    
    public function save(Message $message ){
        
      $data=array(
          
          'name'=>$message->getName(),
          'email'=>$message->getEmail(),
          'message'=>$message->getMessage(),
          'date'=>$message->getDate()->format('Y-m-d H:i:s')
          );
      
        
     
        
     $id=(int)$message->getId();
     
    
     
     if(!$id){
         
       $sql="insert into `messages`(`name`,`email`,`message`,`date`) values(:name,:email,:message,:date)" ;
       
      
         
             }else {
                 
                 
                 $sql="update `messages` set name=:name,email=:email,message=:message,date=:date where id={'$id'}" ;
                 
                 
                   };
     
    
     
     $result=$this->db->getConnectionDB()->prepare($sql);
     
     
     
     return $result->execute($data);
     
     
     
        
    }
    
    
public function getListMessage($action_sort="up",$num_column_sort=1){
    
    
  $sql=$this->sortMessage($action_sort,$num_column_sort) ; 
      
      
      $result=$this->db->getConnectionDB()->query($sql);
       
       $data=array();
    
       while($row=$result->fetch(PDO::FETCH_ASSOC)){
        
        $message=new Message;
        
        
        $message->setId($row['id'])
                ->setName($row['name'])
                ->setEmail($row['email'])
                ->setMessage($row['message'])
                ->setDate($row['date']);
         $data[]=$message; 
        
        }   
      
      
      
      
      return $data;
      
      
      
    
      
    
    
    
}    
    



public function deleteMessage($id) {
    
    $id=(int)$id;
    
    
    $data=array(
        
       'id'=>$id 
        );
    
   $sql="delete from messages where id=:id" ;
   
   $result=$this->db->getConnectionDB()->prepare($sql);
   
    
  return $result->execute($data);
  
 }   
 
 
 
 
public function sortMessage($action,$num_column) {
 
 
 if($action=="down") { $sort="desc";} else { $sort="asc";};
 
 switch($num_column){
  
  case 1: $column="id"; break;
  case 2: $column="name";break;
  case 3: $column="email";break;
  case 4: $column="message";break;
  case 5: $column="date";break;
  
  
  };
 
 
 $sql="select*from messages order by `$column` $sort" ; 
      
      
      
      
      
      
      return $sql;
 
 
 
 
 
 
}   
 
 
 
    
}