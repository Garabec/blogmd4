<?php


use Lib\Config;
use Lib\Session;
use Lib\App;


use Lib\Controller;
use Controllers\PageController;
use Symfony\Component\Yaml\Yaml;



define(ROOT,dirname(__DIR__));
define(DS,DIRECTORY_SEPARATOR);
define(VIEW_DIR,ROOT.DS."src".DS."Views");
define(CONFIG_DIR,ROOT.DS."config");
define(LIB_DIR,ROOT.DS."src".DS."Lib");
define(MODEL_DIR,ROOT.DS."src".DS."Models");
define(CONTROLLER_DIR,ROOT.DS."src".DS."Controllers");
define(VENDOR_DIR,ROOT.DS."vendor".DS);

require_once CONFIG_DIR.DS.'init.php';
require VENDOR_DIR . 'autoload.php';



Session::start();



App::run($_SERVER[REQUEST_URI]);
 
//  try{
     
// App::run($_SERVER[REQUEST_URI]);

// }catch (\Exception $e){
    
//  $e->getMessage() ; 
    
// }catch(\PDOException $a){
    
//   $a->getMessage() ;   
    
// }



