<?php


namespace Models\User;

class User {
    
    
   protected $id;
   
   protected $name;
   
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $email
     */
    public function setName($name)
    {
        $this->name = $name;
        
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