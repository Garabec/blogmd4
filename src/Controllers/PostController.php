<?php 

namespace Controllers;

use Lib\Controller;
use Lib\Pagination;
use Lib\App;
use Lib\Request;
use Lib\CommentForm;
use Models\Comment\Comment;
use Lib\Session;
use Models\Post\PostFormEdit;
use Models\Post\Post;

class PostController extends Controller {
    
 /**
     * 
     *
     * indexAction
     * 
     */
    public function indexAction()
    
     {
         $top5=$this->container->get('repasitory_man')->get('Post')->getCommentators(5);
         $top3=$this->container->get('repasitory_man')->get('Post')->getTopPost(3);
      
        $category_posts=array();

        $category_posts['news'] = $this->container->get('repasitory_man')->get('Post')->getListCategoryPost('News');
        $category_posts['sport'] = $this->container->get('repasitory_man')->get('Post')->getListCategoryPost('Sport');
        $category_posts['world'] = $this->container->get('repasitory_man')->get('Post')->getListCategoryPost('World');
        $category_posts['politic'] = $this->container->get('repasitory_man')->get('Post')->getListCategoryPost('Politic');


         

        return $this->render( array(
            'category' => $category_posts,
            'top5'=> $top5,
            'top3'=> $top3
        ));
    }



    public function showAction(Request $request){
        
     $params=$request->get('params');    
        
     $id=$params[0];
     
     $post = $this->container->get('repasitory_man')->get('Post')->getPost($id);
     
     return $this->render( array(
         
            'post' => $post
        ));
        
        
    }
    
    /**
     * 
     *
     * show_categoryAction
     * 
     */
    public function category_showAction(Request $request)
    
    {
        
        $params=$request->get('params'); 
        
        $page=$request->get('page');
        
        
        
        
        $category_name=$params[0];
        
 
        $category_posts = $this->container->get('repasitory_man')->get('Post')->getListCategoryPost($category_name ,$page);
        
        if($page) { $currentPage=$page;} else {$currentPage=1;};
      
          $perPage=5;//todo config
      
                 $countItems= (int)$this->container->get('repasitory_man')->get('Post')->countPost($category_name);
      
      
      
                        $buttons= (new Pagination($countItems,$perPage,$currentPage))->buttons;
       
         

        return $this->render( array(
            'category' => $category_posts,
            'buttons' => $buttons
        ));
    }
    
    /**
     * 
     *
     * commentAction
     * 
     */
    public function commentAction(Request $request)
    
    {
     
     $params=$request->get('params');    
        
     $id=$params[0];
     
     
     if(!Session::has('user')){
      
     
      
      
     };
     
        
     
     
     
     
     $post = $this->container->get('repasitory_man')->get('Post')->getPost($id);
     
     
     
     $form=new CommentForm;
     
     
     
     if($form->getRequest()->isPost()){
       
        if($form->isValid()){
          
              $comment=new Comment;
              
                $comment->getDataFromForm($form);
                
                $user=Session::get('user');
                
                $comment->setAuthor($user);
                
                $id_user=$this->container->get('repasitory_man')->get('User')->findIdUser($user);
                
                $comment->setUserId($id_user['id']);
                
               
                
                 if($this->container->get('repasitory_man')->get('Comment')->save($comment->setPost($post))){
                     
                  
        
                Session::setFlash('Save comment');
        
        
             }else{ Session::setFlash('No save comment');};
       
       
     }else{ Session::setFlash('Fill the fields');};
         
     
     
     
     
     
     
     App::redirect("/post/$id");
       
    }
    }
    
   

   public function rating_commentAction(Request $request){
       
       
       
       
       
       
   }
    
    
    public function editPostAction(Request $request){
        
       $params=$request->get('params'); 
     
     $alias=isset($params[0])?strtolower($params[0]):null;
        
      $post=$this->container->get('repasitory_man')->get('Post')->getPost($alias); 
      
      $catigories=$this->container->get('repasitory_man')->get('Category')->findAll();
      
     
      
      $this->render(array('post' => $post,
                    'catigories' => $catigories) ); 
        
        
        
        
      
        
        
        
    }
    
    
    public function form_edit_postAction(){
        
        
     
     $form=new PostFormEdit;
     
     
     
     if($form->getRequest()->isPost()){
       
        if($form->isValid()){
          
              $post=new Post;
              
                $post->getDataFromForm($form);
                
                
                
                 if($this->container->get('repasitory_man')->get('Post')->save($post)){
                     
                  
        
                Session::setFlash('Edit post');
        
        
             }else{ Session::setFlash('No save post');};
       
       
     }else{ Session::setFlash('Fill the fields');};
         
     
     
     
     
     
     
     App::redirect("/admin/post"); 
        
        
        
        
        
        
        
    }
    
    
    
    }   
    
public function searchAction(Request $request){
 



 if($request->isPost())
{
 
 
 
 $search = $request->getPostKey('q'); 
  
  

 $result=$this->container->get('repasitory_man')->get('Post')->searchTitlePost($search);
 
 
 If (count($result) > 0)
{
   
 foreach($result as $post) {   
    
echo '
 

<li>

<div class="block-title-price">

<a href="">'.$post.'</a>

 
</div>
 
</li>
' ;


}

 

if (count($result) > 5)
{
    echo '
<center>
<a id="search-more" href="">Посмотреть все результаты →</a>
</center>    
';
 
}
 
}else{
 

    echo '
<center>
<a id="search-noresult">Ничего не найдено! :\'(</a>
</center>    
';    
}
 }
 
 
 
} 
  
public function commentatorAction(Request $request ){
 
 $params=$request->get('params');    
        
     $id=$params[0];
     
$comments=$this->container->get('repasitory_man')->get('Post')->getComments($id);     

 
$this->render(array(
 
 
 'comments'=>$comments
 
 
 )); 
 
 
}  

public function comment_ratingAction(Request $request){
 
  if($request->isPost())
{
 
 
 
 $id = $request->getPostKey('q');
 
 
 
 
 $comment=$this->container->get('repasitory_man')->get('Post')->getComment($id); 
 
 if(Session::has('user')){
      
     
      
     $comment->setNotLike($comment->getNotLike()+1);
 
 
};
 
 $result=$this->container->get('repasitory_man')->get('Comment')->save($comment);
 
 
 
 
 
echo $comment->getNotLike() ; 
 
 
 
 
 
}


}


public function comment_rating_plusAction(Request $request){
 
  if($request->isPost())
{
 
 
 
 $id = $request->getPostKey('q');
 
 
 
 
 $comment=$this->container->get('repasitory_man')->get('Post')->getComment($id); 
 
if(Session::has('user')){
 
 $comment->setLike($comment->getLike()+1);
 
} 

 
 $result=$this->container->get('repasitory_man')->get('Comment')->save($comment);
 
 
 
 
 
echo $comment->getLike() ; 
 
 
 
 
 
}


}


  
}