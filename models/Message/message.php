<?php

class Message
{
    private $id;
    private $name;
    private $email;
    private $message;
    
    /**
     * @var \DateTime
     */
    private $date;
    

    public function __construct()
    {
        $this->date = new DateTime();
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
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
     * @param mixed $username
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        
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
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $created
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param mixed $ipAddress
     * @return $this
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        
        return $this;
    }
    
    /**
     * @param ContactForm $form
     * @return $this
     */
    public function setDataFromForm(ContactForm $form)
    {
        foreach ($form->getData() as $property => $value) {
            $this->$property = $value;
        }
        
        return $this;
    }
    
}