<?php

namespace application\core;

use application\core\View;

abstract class Controller{

    public $route;
    public $view;
    public $acl;
    //public $model;
    public function __construct($route){
        $this->route=$route;
        if(!$this->checkAcl())
            View::errorCode(403);
        $this->view = new View($route);
        $this->model=$this->loadModule($route['controller']);
        
    }
    public function loadModule($name){
        $path='application\models\\'.ucfirst($name);
        if(class_exists($path)) return new $path;
        
    }
    public function checkAcl(){
        $this->acl = require 'application/acl/'.$this->route['controller'].'.php';
        if($this->isAcl('all')) return TRUE;
        elseif(isset($_SESSION['autorize']['id']) && $this->isAcl('authorize')) return TRUE;
        elseif(!isset($_SESSION['autorize']['id']) && $this->isAcl('guest')) return TRUE;
        elseif(isset($_SESSION['admin']) && $this->isAcl('admin')) return TRUE;
        else return FALSE;
    }
    public function isAcl($key){
        return in_array($this->route['action'],$this->acl[$key]);
    }
}
?>