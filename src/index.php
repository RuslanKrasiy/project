<?php
session_start();
    include "vista/page.php";
    include "vista/account.php";
    include "functions.php";
    spl_autoload_register(function ($clase){
        require_once ('class/'.$clase.'.php');
    });
    $st=new page();
    
if(isset($_POST['logOut'])){
    session_destroy();
}
if(isset($_SESSION['user']) && !isset($_POST['logOut'])){
    
    if($_GET['account']){
        $perfil=new account();
        if($_SESSION['user']['publicacion']=='0'){
            $perfil->crear="disabled";
            $perfil->mostar="";
 
        }else{
            $perfil->crear="";
            $perfil->mostar="disabled";
        }
 
        if(isset($_POST['crearAnun'])){
            $bd=new dbase();
            $anuncio=new anuncio($_SESSION['user']['id']);
            $anuncio->id_cat=$_POST['categoria'];
            $anuncio->titulo=$_POST['titulo'];
            $anuncio->subtitulo=$_POST['subtitulo'];
            $anuncio->descripcion=$_POST['descripcion'];
            $anuncio->fotos="/img/foto1.png";
            $anuncio->insert($bd->link);
            //$anuncio->showAnuncio($bd->link);
            $perfil->perfilMenu();
            //$perfil->pintAccount();
            $st->menu();
            $st->section=$perfil->pintAccount();

        }else
        if(isset($_POST['updateProfil'])){

        }else
        if(isset($_POST['cambPasswd'])){

        }else{
            $bd=new dbase();
            $categorias = new categorias();
            $row=$categorias->getCategorias($bd->link);
            $perfil->valor=drawSelect($row,'categoria');
            $perfil->perfilMenu();
            //$perfil->pintAccount();
            $st->menu();
            $st->section=$perfil->pintAccount();
        }
        
    }else
    if($_GET['categorias']){
        $st->section="ES categorias";
        $st->menu();
    }else{
        $bd=new dbase();
        $link=$bd->link;
        $consult=$link->prepare("Select A.id,A.fotos,A.titulo,A.subtitulo, V.puntos
        From anuncio A,votar V
        where A.id=V.id_anuncio");
        $consult->execute();
        while($row=$consult->fetch(PDO::FETCH_ASSOC)){
            $st->valor=$row;
            $st->section.=$st->anuncio();
        }        
        $st->loged($_SESSION['user']['email']);
        $st->headerHTML();
        $st->menu();
    }

}else{
    if(isset($_POST['signup'])){
        $bd=new dbase();
        $data=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
        $paswd=$_POST['password'];
        $hash = password_hash($paswd, PASSWORD_DEFAULT);
        $user=new user();

        $user->nombre=$_POST['nombre'];
        $user->apellido=$_POST['apellido'];
        $user->email=$_POST['email'];
        $user->ciudad=$_POST['ciudad'];
        $user->passwd=$hash;
        $user->fecha_nac=$data;
        $user->insert($bd->link);
    
        /*$_SESSION['user']=[
            
            'email'=>$_POST['email'],
            'nombre'=>$_POST['nombre'],
            'foto'=>$_POST['foto'],
            'foto'=>$_POST['ciudad'],
            'fecha_nac'=>$data
        ];*/
        redirect("/");
    }
    if(isset($_POST['logIn'])){
        $bd=new dbase();
        $user=new user();
        $user->email=$_POST['email'];
        if(($fila=$user->exist($bd->link))&&(password_verify($_POST['password'], $fila['passwd']))){

            $_SESSION['user']=[
                'id'=>$fila['id'],
                'email'=>$fila['email'],
                'nombre'=>$fila['nombre'],
                'apellido'=>$fila['apellido'],
                'ciudad'=>$fila['ciudad'],
                'publicacion'=>$fila['publicacion'],
                'fecha_nac'=>$fila['fecha_nac']
            ];
            redirect("/");
        }else{
            $st->error="email y/o contraseña es incorecto";
            $st->valor=$_POST['email'];
            $st->formEntrada();
        }
    }else if(isset($_GET['register'])){
            $bd=new dbase();
            $ciudades = new ciudades();
            $row=$ciudades->getCiudades($bd->link);
            $st->valor=drawSelect($row,"ciudad");
            $st->registrar();
        }else if(isset($_GET['recover'])){
            $st->section="<h1>REcuperar contraseña</h1>";// H1
    }else{
        $st->formEntrada();
    }

}
echo $st->head();
echo $st->pintHeader();
echo $st->pintMenu();
echo $st->pintSection();
echo $st->pintFooter();
  




function random_str($num=30){
    return substr(str_shuffle('0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM'),0,$num);
}

?>
<script>
    $('.ui.checkbox')
    .checkbox()
    ;
/*var aim=window.location.href;

var sst=aim.indexOf("/?");
console.log(sst);
var loc=aim.substring(sst,aim.length);
var menu=document.getElementById("main");
//if($("#main .item").attr("href")==loc)
var nodo=menu.querySelector("a[href='"+loc+"']");
nodo.classList.add("active");*/
</script>


