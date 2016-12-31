
<?php


class Book {
    
    
    private $id;
    private $title;
    private $description;
    private $price;
    private $isActive;
    private $style;
    
    
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return $this
     * 
     * todo: validation of price
     */
    public function setPrice($price)
    {
        $this->price = $price;
        
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     * @return $this
     */
    public function setIsActive($isActive)
    {
        $this->isActive = (bool) $isActive;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param mixed $style
     * @return $this
     */
    public function setStyle(Style $style)
    {
        $this->style = $style;
        
        return $this;
    }
    
    
    public function getFromFormData( $form){
        
        
        
       foreach($form->getData() as $property=>$values) {
           
         
              if(property_exists($this,$property)) { $this->$property=$values;}; 
        
        
        }
        
      return $this;  
    }
    
}