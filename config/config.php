<?php

use Lib\Config;

Config::set('My name site','Site MVC');



Config::set('routers_layout',array(
    
             'default'=>'',
             'admin'=>'admin_'
));








Config::set('default_router','default');
Config::set('default_controller','PostController');
Config::set('default_action','indexAction');


Config::set('connectionDB',array (
                           'host' => 'localhost',
                           'dbname' => 'blog',
                           'password' => '',
                           'user'=> 'root'
                           ));   
                           
Config::set('role' ,array ('admin','superuser','user'));                          