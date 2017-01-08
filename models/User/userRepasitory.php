<?php


class UserRepasitory extends Model {
    
    
    protected $user;
    
   
    
    
    
    
    
    
    public function find(User $user){
        
        
      $data=array(
          
          'email' => $user->getEmail(),
          
          'password' => Password::getHashPassword($user->getPassword()) 
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

           'password' => Password::getHashPassword($user->getPassword()),
          
          'role'=>'user'
          
          ) ;
          
          
          
         var_dump($data) ;
          
      $sql=$sql="insert into `user`(`email`,`password`,`role`) values(:email,:password,:role)" ; 
      
      
      $sth=$this->db->getConnectionDB()->prepare($sql);
      
      
      
       return  $sth->execute($data);  
        
        
        
       
       
       
       
   } 
 
 
 
public function getListUsers($action_sort="up",$num_column_sort=1) {
    
    
    $sql=$this->sortUser($action_sort,$num_column_sort) ; 
      
      
      $result=$this->db->getConnectionDB()->query($sql);
       
       $data=array();
    
       while($row=$result->fetch(PDO::FETCH_ASSOC)){
        
        $user=new User;
        
        
        $user->setId($row['id'])
             ->setEmail($row['email'])
             ->setPassword($row['password'])
             ->setRole($row['role']);
        
         $data[]=$user; 
        
        }   
      
      
      
      
      return $data;
      
      
      
    
    
    
    
    
}
 
 
 
 public function findUser($id){
        
        
      $id=(int)$id;
          
      $sql="select*from `user` where `id`='$id'" ;
      
      
      $result=$this->db->getConnectionDB()->query($sql);
      
      $row=$result->fetch(PDO::FETCH_ASSOC); 
      
      $user=new User;
        
        
        $user->setId($row['id'])
             ->setEmail($row['email'])
             ->setPassword($row['password'])
             ->setRole($row['role']);
      
      
      
      return  $user;
      
        
        }
        
        
  public function save(User $user) {
      
      
      
      
      if($user->getPassword()==""){
         
         
      $id=(int)$user->getId();
      
          
      $sql="select `password` from `user` where `id`='$id'" ;
      
      
      $result=$this->db->getConnectionDB()->query($sql);
      
      $row=$result->fetch(PDO::FETCH_ASSOC); 
      
      
       $hash_password=$row['password'];
        
        
      
              } else {
                        $hash_password=  ( new Password($user->getPassword()  -> getHashPassword()) );
     
     
     
     
                    };
    
    
      
     $user->setPassword($hash_password); 
      
      
     $data=array(
         
         'email'=>$user->getEmail(),
         'password'=>$user->getPassword(),
         'role'=>$user->getRole(),
         'id'=>$user->getId()
           );
           
           
           
     $sql="update `user` set `email`=:email,`password`=:password,`role`=:role where `id`=:id" ;
 
 
     $result=$this->db->getConnectionDB()->prepare($sql);
     
     
     
     return $result->execute($data);
 
     
     }     
        
        
   public function deleteUser($id) {
    
    $id=(int)$id;
    
    
    $data=array(
        
       'id'=>$id 
        );
    
   $sql="delete from `user` where id=:id" ;
   
   $result=$this->db->getConnectionDB()->prepare($sql);
   
    
  return $result->execute($data);
  
 }   
    
   

public function sortUser($action,$num_column) {
 
 
 if($action=="down") { $sort="desc";} else { $sort="asc";};
 
 switch($num_column){
  
  case 1: $column="id"; break;
  case 2: $column="email";break;
  case 3: $column="password";break;
  case 4: $column="role";break;
  
  
  
  };
 
 
 $sql="select*from user order by `$column` $sort" ; 
      
      
      
      
      
      
      return $sql;
 
 
 
 
 
 
}   



public function logout(){
 
 
 Session::delete_session('user');
 
 Session::destroy();
 
 
 
}





    
    
}