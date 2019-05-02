<?php

namespace application\controllers;
use application\core\Controller;

class NewsController extends Controller{



    public function showAction(){
        echo "<p>News page.</p>";
        var_dump($this->route);
    }
}
?>