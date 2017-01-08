<?php




define(ROOT,dirname(__DIR__));
define(DS,DIRECTORY_SEPARATOR);
define(VIEW_DIR,ROOT.DS."views");
define(CONFIG_DIR,ROOT.DS."config");
define(LIB_DIR,ROOT.DS."lib");
define(MODEL_DIR,ROOT.DS."models");
define(CONTROLLER_DIR,ROOT.DS."controllers");

require_once CONFIG_DIR.DS.'init.php';


//Session::setFlash('Hallo');

 Session::start();
App::run($_SERVER[REQUEST_URI]);




//$test=App::$db->query('select*from book');

//echo '<pre>';

//print_r($test);

//echo '</pre>';