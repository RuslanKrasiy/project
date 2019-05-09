<?php

    require 'application/lib/dev.php';
    use application\core\Router;
// funcion para ver datalles
 
    spl_autoload_register(function ($class){
        //require_once ('clases/'.$clase.'.php');
        $path = str_replace('\\','/',$class.".php");
        
        if(file_exists($path))
            require $path;
    });
session_start();

$router= new Router();
$router->run();
?>