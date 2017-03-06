<?php

namespace Models\Author;

class Author 
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
    private $username;

   
    
    /**
     * 
     * DateTime
     * 
     * 
     */
    private $createdAt;
    
 
    
    
    public function __construct()
    
    {
        $this->createdAt = new \DateTime();
        $this->posts=array();
    }




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
    public function setUserName($name)
    {
        $this->username = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->username;
    }

    

    /**
     * Add post
     *
     * 
     *
     * 
     */
    public function addPost(Post $post)
    {
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * 
     */
    public function removePost(Post $post)
    {
        $this->posts->removeElement($post);
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
        return $this->username;
    }
    
    
    /**
     * Set createdAt
     *
     *  \DateTime $createdAt
     *
     * 
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     *  \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    
    
    

    
    
}