<?php




spl_autoload_register(function ($className) {
    
    $file = ROOT.DS."src".DS.str_replace('\\', DS, "{$className}.php");
    
    
    
    if (!file_exists($file)) 
    
    {
        throw new \Exception("{$className} class not found", 500);
    }
    
    require $file;
});

require_once CONFIG_DIR.DS.'config.php';