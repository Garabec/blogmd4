<?php



Config::set('My name site','Site MVC');

Config::set('language',array('en','fr'));

Config::set('routers',array(
    
             'default'=>'',
             'admin'=>'admin_'
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