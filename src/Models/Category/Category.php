<?php

namespace Models\Category;

class Category 
{
    /**
     *  int
     *
     * 
     */
    protected $id;

    /**
     * 
     *string
     * 
     */
    private $name;
    
    /**
     * 
     *string
     * 
     */
    private $posts=array();
   




    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * set posts
     *
     * 
     *
     * 
     */
    public function setPosts(Array $posts)
    {
        $this->posts = $posts;

        return $this;
    }

   

    /**
     * Get posts
     *
     * 
     */
    public function getPosts()
    {
        return $this->posts;
    }


     public function __toString()
    {
        return $this->name;
    }

}
    
    
    