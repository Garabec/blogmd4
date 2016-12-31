<?php

function autoload_class($classname){
    
    
    
    
$path_lib=LIB_DIR.DS.strtolower($classname).'.class.php';

$path_controller=CONTROLLER_DIR.DS.strtolower(str_replace('Controller','',$classname)).'.controller.php';

$path_model=MODEL_DIR.DS.ucfirst($classname).DS.strtolower($classname).'.php';

$path_model_repasitory=MODEL_DIR.DS.ucfirst(str_replace('Repasitory','',$classname)).DS.strtolower(str_replace('Repasitory','',$classname)).'Repasitory.php';



if(file_exists($path_lib)){
    
     return require_once $path_lib;
    
}

elseif (file_exists($path_model)) {
    
     return   require_once $path_model;
     
}        

elseif (file_exists($path_model_repasitory)) {
    
     return   require_once $path_model_repasitory;
     
}      


elseif(file_exists($path_controller)){
    
   
     return  require_once $path_controller; 
    
}    
    

    
 


    
}

spl_autoload_register('autoload_class');


require_once CONFIG_DIR.DS.'config.php';