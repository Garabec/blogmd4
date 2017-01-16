<?php




define(ROOT,dirname(__DIR__));
define(DS,DIRECTORY_SEPARATOR);
define(VIEW_DIR,ROOT.DS."views");
define(CONFIG_DIR,ROOT.DS."config");
define(LIB_DIR,ROOT.DS."lib");
define(MODEL_DIR,ROOT.DS."models");
define(CONTROLLER_DIR,ROOT.DS."controllers");

require_once CONFIG_DIR.DS.'init.php';




Session::start();
 
 try{
     
App::run($_SERVER[REQUEST_URI]);

}catch (Exception $e){
    
 $e->getMessage() ; 
    
}catch(PDOException $a){
    
  $a->getMessage() ;   
    
}



