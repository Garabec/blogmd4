<?php


class UserRepasitory extends Model {
    
    
    protected $user;
    
    
    
    public function find(User $user){
        
        
      $data=array(
          
          'email' => $user->getEmail(),
          
          'password' => $user->getPassword()
          
          )  ;
          
          
         var_dump($data) ;
          
      $sql="select*from `user` where `email`=:email and `password`=:password" ;
      
      
      $sth=$this->db->getConnectionDB()->prepare($sql);
      
      
      
     
          
          
     $sth->execute($data); 
      
    
          
        
      return  $sth->fetch(PDO::FETCH_ASSOC); 
        
        
        
        
    }
    
    
    public function findNameUser(User $user){
        
        
      $data=array(
          
          'email' => $user->getEmail()
          
          
          
          )  ;
          
          
         var_dump($data) ;
          
      $sql="select*from `user` where `email`=:email" ;
      
      
      $sth=$this->db->getConnectionDB()->prepare($sql);
      
      
      
     
          
          
     $sth->execute($data); 
      
    
          
        
      return  $sth->fetch(PDO::FETCH_ASSOC); 
        
        
        
        
    }
    
    
   public function addUser(User $user){
       
       $data=array(
          
          'email' => $user->getEmail(),
          
          'password' => $user->getPassword()
          
          )  ;
          
          
         var_dump($data) ;
          
      $sql=$sql="insert into `user`(`email`,`password`) values(:email,:password)" ; ;
      
      
      $sth=$this->db->getConnectionDB()->prepare($sql);
      
      
      
       return  $sth->execute($data);  
        
        
        
       
       
       
       
   } 
 
 
 
public function getListUsers() {
    
    
    $sql='select*from user' ; 
      
      
      $result=$this->db->getConnectionDB()->query($sql);
       
       $data=array();
    
       while($row=$result->fetch(PDO::FETCH_ASSOC)){
        
        $user=new User;
        
        
        $user->setId($row['id'])
             ->setEmail($row['email'])
             ->setPassword($row['password']);
             
        
         $data[]=$user; 
        
        }   
      
      
      
      
      return $data;
      
      
      
    
    
    
    
    
}
 
    
    
}