<?php
session_start();

spl_autoload_register(function ($clase){
    require_once ('class/'.$clase.'.php');
});

if(isset($_SESSION['user'])){
    if(isset($_POST['comenta'])){
        $bd=new dbase();
        $user=new usuario();
        $user->email=$_SESSION['user']['email'];
        $user->comenta($bd->link,$_POST['codAnuncio'],$_POST['texto']);
        echo $_SESSION['user']['nombre']." ";
        echo $_SESSION['user']['apellido'];

    }
    if(isset($_POST['puntua'])){
        $bd=new dbase();
        $user=new usuario();
        $user->email=$_SESSION['user']['email'];
        $user->puntua($bd->link,$_POST['cardId'],$_POST['rate']);
    }
}


?>