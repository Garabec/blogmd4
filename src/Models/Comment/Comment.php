<?php

namespace Models\Comment;


use Models\Post\Post;

/**
 * 
 * 
 */
class Comment 
{
    /**
     * 
     *int
     */
    private $id;

    /**
     * 
     *string
     * 
     */
     
    private $author;

    /**
     *
     *string
     * 
     * 
     */
    private $body;
    
     /*
     *
     */
    private $post;

    /**
     * 
     * DateTime
     * 
     * 
     */
    private $createdAt;
    
    private $user_id;
    
    private $post_id;

    public function __construct()
    
    {
        $this->createdAt = new \DateTime();
        
        
    }
   
    /**
     * Get id
     *
     * 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get id
     *
     * 
     */
    public function setId($id)
    {
         $this->id=$id;
         return $this;
    }

    /**
     * Set author
     *
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set body
     *
     * 
     *
     * 
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set post
     *
     * 
     *
     */
    public function setPost(Post $post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * 
     */
    public function getPost()
    {
        return $this->post;
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
    
   public function getDataFromForm($form){
        
        
        
       foreach($form->getData() as $property=>$values) {
           
         
              if(property_exists($this,$property)) { $this->$property=$values;}; 
        
        
        }
        
      return $this;  
    } 
   
    /**
     * Get id
     *
     * 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get id
     *
     * 
     */
    public function setUserId($user_id)
    {
         $this->user_id=$user_id;
         return $this;
    }
   
    /**
     * Get id
     *
     * 
     */
    public function getLike()
    {
        return $this->like;
    }

    /**
     * Get id
     *
     * 
     */
    public function setLike($like)
    {
         $this->like=$like;
         return $this;
    }

     /**
     * Get id
     *
     * 
     */
    public function getNotLike()
    {
        return $this->notlike;
    }

    /**
     * Get id
     *
     * 
     */
    public function setNotLike($notlike)
    {
         $this->notlike=$notlike;
         return $this;
    }

     /**
     * Get id
     *
     * 
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * Get id
     *
     * 
     */
    public function setPostId($post_id)
    {
         $this->post_id=$post_id;
         return $this;
    }


}




