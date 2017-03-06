<?php


use Lib\Config;
use Lib\Session;
use Lib\App;
use Lib\ExportServicePDF;
use Lib\Configuration;
use Lib\RepasitoryManager;
use Controllers\BookController;
use Lib\Request;
use Lib\Router;


use Lib\Controller;
use Controllers\ErrorController;
use Controllers\PageController;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

define(ROOT,dirname(__DIR__));
define(DS,DIRECTORY_SEPARATOR);
define(VIEW_DIR,ROOT.DS."src".DS."Views");

define(CONFIG_DIR,ROOT.DS."config");
define(LIB_DIR,ROOT.DS."src".DS."Lib");
define(MODEL_DIR,ROOT.DS."src".DS."Models");
define(CONTROLLER_DIR,ROOT.DS."src".DS."Controllers");
define(VENDOR_DIR,ROOT.DS."vendor".DS);





require VENDOR_DIR . 'autoload.php';

// App::run($_SERVER[REQUEST_URI]);
 // try{
  
require_once CONFIG_DIR.DS.'init.php';  

Session::start();

$app= (new App())->run(new Request());




// }catch (\Exception $e){
 
//  $controller=new Controllers\ErrorController($e);
    
// $controller->errorAction();
    
// }catch(\PDOException $a){
    
//  $controller=new Controllers\ErrorController($e);
    
// $controller->errorAction();  
    
// }



