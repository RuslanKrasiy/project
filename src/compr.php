<?php
session_start();
include "vista/anuncioRender.php";
spl_autoload_register(function ($clase){
    require_once ('class/'.$clase.'.php');
});

if(isset($_SESSION['user'])){
    /**
     * GUARDAR EL COMENTARIO A LA BASE DE DATOS
     * A TRAVES DE JQUERY POST
     */
    if(isset($_POST['comenta'])){
        $bd=new dbase();
        $user=new usuario();
        $user->email=$_SESSION['user']['email'];
        $user->comenta($bd->link,$_POST['codAnuncio'],$_POST['texto']);
        echo $_SESSION['user']['nombre']." ";
        echo $_SESSION['user']['apellido'];

    }
    /**
     * GUARDAR LA PUNTUACION DEL USUARIO SOBRE UN ANUNCIO
     *  A TRAVES DE JQUERY POST
     */
    if(isset($_POST['puntua'])){
        $bd=new dbase();
        $user=new usuario();
        $user->email=$_SESSION['user']['email'];
        $user->puntua($bd->link,$_POST['cardId'],$_POST['rate']);
    }
    /**
     * MOSTRAR TODOS ANUNCIOS DEL USUARIO AUTORIZADO,
     * PULSANDO EL BOTON EN ´MI PERFIL´ -VER ANUNCIOS-
     */
    if(isset($_POST['anuncio'])){
        //echo $_POST['email'];
        $bd=new dbase();
        $user=new usuario();

        $user->email=$_SESSION['user']['email'];
        $row=$user->misAnuncios($bd->link);


        for($i=0;$i<count($row);$i++){
            $nuevo_nombre=explode("/",$row[$i]['fotos']);
            $img_url="img/anuncios/".$row[$i]['id']."/".$nuevo_nombre[0];
            if($row[$i]['puntos']==null) echo 0;
            else echo $row[$i]['puntos']."?";

            echo $row[$i]['id']."?";
            echo $img_url."?";
            echo $row[$i]['titulo']."?";
            echo $row[$i]['subtitulo']."?";
            echo $row[$i]['votados'];
            if($i<(count($row)-1)) echo "@";
        }
    }
}


?>