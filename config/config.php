<?php

use Lib\Config;

Config::set('My name site','Site MVC');

Config::set('language',array('en','fr'));

Config::set('routers_layout',array(
    
             'default'=>'',
             'admin'=>'admin_'
));


Config::set('routers',array(
    
             'book\/?'=>'book/list',
             
             'admin\/book\/list\?page=([\d]+)'=>'admin/book/list/up/1?page=$1',
             
             'book\/([\d]+)\/?'=>'book/view/$1',
             
             'book\/view\/([\d]+)\/?'=>'book/view/$1',
             
             'book\/add\/([\d]+)'=>'book/addCart/$1',
             
             'contact\/?([\w]+)?\/?'=>'contact/send',
             
             'security\/login'=>'security/login',
              
             'security\/logout'=>'security/logout',
             
             'admin\/?([\w]+)?\/?'=>'admin/'
             
             
             
));







Config::set('default_language','en');
Config::set('default_router','default');
Config::set('default_controller','page');
Config::set('default_action','index');


Config::set('connectionDB',array (
                           'host' => 'localhost',
                           'dbname' => 'mvc-group-609',
                           'password' => '',
                           'user'=> 'root'
                           ));   
                           
Config::set('role' ,array ('admin','superuser','user'));                          