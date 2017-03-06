<?php
use Lib\Route;

return  array(
  
    // site routes
    
    
    
    
    'default'=> new Route('/','PostController','index'),
    'post_show'=> new Route('/post/{id}','PostController','show', array('id' => '[0-9]+')),
    'comment'=> new Route('/comment/{id}','PostController','comment', array('id' => '[0-9]+')),
    'category_show'=> new Route('/category/{name}','PostController','category_show', array('name' => '[a-zA-Z]+')),
    'category_show_page'=> new Route('/category/{name}\?page={id}','PostController','category_show', array('name' => '[a-zA-Z]+' , 'id'=>'[0-9]+')),
    'search'=>new Route('/search','PostController','search'),
    'commentator'=> new Route('/commentator/{id}','PostController','commentator', array('id' => '[0-9]+')),
    'comment_rating'=>new Route('/comment_rating','PostController','comment_rating'),
    'comment_rating_plus'=>new Route('/comment_rating_plus','PostController','comment_rating_plus'),
    
    
    'admin_post_list'=> new Route('/admin/post','SecurityController','admin_post'),
    'admin_post_cat'=> new Route('/admin/post/{name}','SecurityController','admin_post',array('name' => '[a-zA-Z]+')),
    'admin_post_page'=> new Route('/admin/post/{name}\?page={id}','SecurityController','admin_post',array('name' => '[a-zA-Z]+' , 'id'=>'[0-9]+')),
    'admin_comment'=> new Route('/admin/comment','SecurityController','admin_comment'),
    'admin_comment_page'=> new Route('/admin/comment\?page={id}','SecurityController','admin_comment',array('id' => '[0-9]+')),
    'admin_editpost'=> new Route('/admin/editpost/{id}','PostController','editPost',array('id' => '[0-9]+')),
    'admin_formeditpost'=> new Route('/admin/post/form_edit_post','PostController','form_edit_post'),
    
    
    
    
    //'default'=> new Route('/','PageController','index'),
    
    'contact_send' => new Route('/contact/send', 'ContactController', 'send'),
    'register' => new Route('/security/register', 'SecurityController', 'register'),
    'login' => new Route('/security/login', 'SecurityController', 'login'),
    'logout' => new Route('/security/logout', 'SecurityController', 'logout'),
    'admin_default'=> new Route('/admin','PageController','admin_index'),
    
                                                                                                  
    
                                                                                                                                                                                              
   
   
    
    'admin_user'=> new Route('/admin/security/users','SecurityController','admin_users'),
    'admin_user_save'=> new Route('/admin/security/user_save_edit','SecurityController','admin_user_save_edit'),
    'admin_user_delete'=> new Route('/admin/security/delete_user/{id}','SecurityController','admin_delete_user',array('id' => '[0-9]+')),
    'admin_user_edit_form'=> new Route('/admin/security/edit_form_user/{id}','SecurityController','admin_edit_form_user',array('id' => '[0-9]+')),
    'admin_message'=> new Route('/admin/contact/message','ContactController','admin_message'),
    'admin_message_delete' => new Route('/admin/contact/message_delete/{id}','ContactController','admin_message_delete', array('id' => '[0-9]+')),
   
    );

  

