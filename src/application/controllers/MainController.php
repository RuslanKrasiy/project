<?php

namespace application\controllers;
use application\core\Controller;

class MainController extends Controller{



    public function indexAction(){
        $vars = [
            'name' => 'Rus',
            'age' => 31,
        ];
        $this->view->render('Main page', $vars);
    }
}
?>