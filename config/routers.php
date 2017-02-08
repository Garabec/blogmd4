<?php
use Lib\Route;

return  array(
  
    // site routes
    
    
    'books_index' => new Route('/book/index', 'BookController', 'index'),
    'books_list' => new Route('/book/list', 'BookController', 'list'),
    'books_list_page' => new Route('/book/list\/?{page}?', 'BookController', 'list',array('page'=>'\?page=[0-9]+')),
    'books_view_cart' => new Route('/book/delete_product_cart/{id}', 'BookController', 'delete_product_cart',array('id' => '[0-9]+')),
    'delete_product_cart'=>new Route('/book/view_cart', 'BookController', 'view_cart'),
    'books_clear_cart' => new Route('/book/clear_cart', 'BookController', 'clear_cart'),
    'book_page' => new Route('/book/view/{id}', 'BookController', 'view', array('id' => '[0-9]+') ),
    'book_add' => new Route('/book/add_product_cart/{id}', 'BookController', 'add_product_cart', array('id' => '[0-9]+') ),
    'contact_send' => new Route('/contact/send', 'ContactController', 'send'),
    'register' => new Route('/security/register', 'SecurityController', 'register'),
    'login' => new Route('/security/login', 'SecurityController', 'login'),
    'logout' => new Route('/security/logout', 'SecurityController', 'logout'),
    'admin_default'=> new Route('/admin','PageController','admin_index'),
    'admin_book'=> new Route('/admin/book/list\&?{sort}?\&?{page}?','BookController','admin_list',array('sort'=>'/[a-z]+\/?\=?[0-9]+','page'=>'\?page=[0-9]+')),
                                                                                                  
    
                                                                                                                                                                                              
    'admin_edit_book'=> new Route('/admin/book/edit_form_book/{id}','BookController','admin_edit_form_book',array('id' => '[0-9]+')),
    'admin_add_book'=> new Route('/admin/book/add','BookController','admin_add'),
    'admin_edit_book_form'=> new Route('/admin/book/edit_book','BookController','admin_edit_book'),
    'admin_delete_book'=> new Route('/admin/book/delete_book/{id}','BookController','admin_delete_book',array('id' => '[0-9]+')),
   
    'admin_pdf'=> new Route('/admin/book/pdf','BookController','admin_pdf'),
    'admin_excel'=> new Route('/admin/book/excel','BookController','admin_excel'),
    'admin_user'=> new Route('/admin/security/users','SecurityController','admin_users'),
    'admin_user_save'=> new Route('/admin/security/user_save_edit','SecurityController','admin_user_save_edit'),
    'admin_user_delete'=> new Route('/admin/security/delete_user/{id}','SecurityController','admin_delete_user',array('id' => '[0-9]+')),
    'admin_user_edit_form'=> new Route('/admin/security/edit_form_user/{id}','SecurityController','admin_edit_form_user',array('id' => '[0-9]+')),
    'admin_message'=> new Route('/admin/contact/message','ContactController','admin_message'),
    'admin_message_delete' => new Route('/admin/contact/message_delete/{id}','ContactController','admin_message_delete', array('id' => '[0-9]+')),
    'api_json' => new Route('/api\?formatter\=json','API\BookController','index'),
    'api_xml' => new Route('/api\?formatter\=xml','API\BookController','index'),
    );

  // Config::set('routers',array(
    
//              'book\/?'=>'book/list',
             
//              'admin\/book\/list\?page=([\d]+)'=>'admin/book/list/up/1?page=$1',
             
//              'book\/([\d]+)\/?'=>'book/view/$1',
             
//              'book\/view\/([\d]+)\/?'=>'book/view/$1',
             
//              'book\/add\/([\d]+)'=>'book/addCart/$1',
             
//              'contact\/?([\w]+)?\/?'=>'contact/send',
             
//              'security\/login'=>'security/login',
              
//              'security\/logout'=>'security/logout',
             
//              'admin\/?([\w]+)?\/?'=>'admin/'
             
             
             
// ));

