<?php


namespace Models\User;

class User {
    
    
   protected $id;
   
   protected $email;
   
   protected $password;
   
   protected $role;
   
   
 /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this; 
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this; 
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
        
        
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        
        return $this; 
        
    }
  
   
   public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $id
     */
    public function setRole($role)
    {
        $this->role = $role;
        
        return $this; 
    }
   
   
   
   
   
    
    public function getFromFormData( $form){
        
        
        
       foreach($form->getData() as $property=>$values) {
           
         
        // $this->$property=$values;
         
           
        if(property_exists($this,$property)) { $this->$property=$values;}; 
        
        
        
           
           
       }
        
      return $this;  
    }
    
    
    
}