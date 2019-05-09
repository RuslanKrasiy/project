<?php
namespace application\core;

class View{
    public $route;
    public $path; // ruta al view
    public $layout='default'; //por defecto

    public function __construct($route){
        $this->route=$route;
        $this->path=$route['controller'].'/'.$route['action'];
    }
    public function render($title,$vars=[]){
        extract($vars);
        $path='application/views/'.$this->path.'.php';
        if(file_exists($path)){
            ob_start();
            require $path;
            $content =ob_get_clean();
            
            require 'application/views/layouts/'.$this->layout.'.php';
        }else{
            echo"nada ".$path;
        }
    }
    public function redirect($url){
        header('location: '.$url);
        exit;
    }
    public static function errorCode($code){
        http_response_code($code);
        $path='application/views/errors/'.$code.'.php';
        if(file_exists($path)){ 
            //ob_start();
            require 'application/views/errors/error_h.php';
            require $path;
            require 'application/views/errors/error_f.php';
            //$content =ob_get_clean();
            //require 'application/views/layouts/'.$this->layout.'.php';
        }
        exit;
    }
    public function message($status,$message){
        exit(json_encode(['status'=>$status,'message'=>$message]));
    }
    public function locatin($url){
        exit(json_encode(['url'=>$url]));
    }
   
}


?>