<?php

namespace application\controllers;
use application\core\Controller;

class ProfileController extends Controller{



    public function profileAction(){
        echo "<p>ProfileController.</p>";
        $this->view->render('Profile');
    }
    public function editAction(){
        echo "<p>ProfileController.</p>";
        $this->view->render('Edit');
    }
    public function announceAction(){
        echo "<p>ProfileController.</p>";
        $this->view->render('announce');
    }
}
?>