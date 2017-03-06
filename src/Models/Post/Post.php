<?php

namespace Models\Post;

use Models\Author\Author;
use Models\Comment\Comment;
use Models\Category\Category;
/**
 * Post
 *
 * 
 *
 */
 
class Post 
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
    private $title;
    
    

    /**
     * string
     *
     * 
     */
    private $body;

    
    /**
     * Author
     *
     * 
     * 
     * 
     */
    private $author;
    
    
    /**
     * 
     *Comments
     **/
     
    private $comments=array();
    
     /**
     * 
     *Comments
     **/
     
    private $comment;
    
    
   /**
     * 
     * DateTime
     * 
     * 
     */
    private $createdAt;
    
    
    private $category;
    


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
     * Set title
     *
     * 
     *
     * 
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * 
     */
    public function getTitle()
    {
        return $this->title;
    }
     
    

    
     
     
    /**
     * Set body
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
     * Set author
     *
     * 
     */
    public function setAuthor(Author $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * 
     *
     */
    public function getAuthor()
    {
        return $this->author;
    }

   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = array();
        $this->createdAt = (new \DateTime())->format('Y-m-d H:i:s');
    }

    /**
     * Add comment
     *
     * 
     *
     * 
     */
    public function setComment(Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }
/**
     * Add comment
     *
     * 
     *
     * 
     */
    public function setComments(Array $comments)
    {
        $this->comments = $comments;

        return $this;
    }
    /**
     * Remove comment
     *
     * 
     */
    public function removeComment(Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * 
     */
    public function getComments()
    {
        return $this->comments;
    }
    
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    public function setCreatedAt($createdAt)
    {
         $this->createdAt=$createdAt;
         
         return $this;
    }
   
   
   /**
     * Set author
     *
     * 
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * 
     *
     */
    public function getCategory()
    {
        return $this->category;
    }
   
   
   public function getDataFromForm($form){
        
        
        
       foreach($form->getData() as $property=>$values) {
           
         
              if(property_exists($this,$property)) { $this->$property=$values;}; 
        
        
        }
        
      return $this;  
    } 
    
}

