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
    
    
public function getListMessage(){
    
    
  $sql='select*from messages' ; 
      
      
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
    
    
    
}