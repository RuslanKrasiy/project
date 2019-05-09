<?php

namespace application\controllers;
use application\core\Controller;

class AnnounceController extends Controller{



    public function billboardAction(){
        echo "<p>AnnounceController.</p>";
        var_dump($this->route);
        $this->view->render('Edit Announce');
    }
    public function editAction(){
        echo "<p>AnnounceController.</p>";
        var_dump($this->route);
        $this->view->render('Edit Announce');
        
    }
}
?>