<?php
session_start();
    include "vista/anuncioRender.php";
    include "vista/page.php";
    include "vista/account.php";
    include "vista/gabinet.php";
    include "functions.php";
    spl_autoload_register(function ($clase){
        require_once ('class/'.$clase.'.php');
    });
$st=new page();
$datos=[];

if(isset($_POST['logOut'])){
    session_destroy();
}

if(isset($_SESSION['user']) && !isset($_POST['logOut'])){

    if(isset($_GET['account'])){
        
        $bd=new dbase();
        $ciudades = new ciudad();
        $datos['ciudad']=$ciudades->getCiudades($bd->link);
        //var_dump($datos['ciudad']);
        $perfil=new account();
        $perfil->ciudad=drawSelect($datos['ciudad'],"ciudad",$_SESSION['user']['ciudad']);

        $user=new usuario();
        $user->email=$_SESSION['user']['email'];
        
        $datos['user']=$user->whoIs($bd->link);
        if($datos['user']==NULL){
            $perfil->crear="none";
            $_SESSION['user']['fecha_nac']="";
        }else{
            $perfil->crear="block";
            $_SESSION['user']['fecha_nac']=$datos['user']['fecha_nac'];
            $_SESSION['user']['publicados']=$datos['user']['publicados'];
            $categoria = new categoria();
            $datos['categoria']=$categoria->getCategorias($bd->link);
            $perfil->valor=drawSelect($datos['categoria'],'categoria');
        }
        if(isset($_POST['cambPasswd'])){
            //$bd=new dbase();
            //$user=new usuario();
            $user->email=$_SESSION['user']['email'];
            if(($fila=$user->exist($bd->link))&&(password_verify($_POST['oldPwd'], $fila['passwd']))){
                $paswd=$_POST['nuevoPwd'];
                $hash = password_hash($paswd, PASSWORD_DEFAULT);
                $user->passwd=$hash;
                $user->cambiarPwd($bd->link);
            }else{
                $st->error="La contaseña incorecta";
            }
        }if(isset($_POST['updateProfil'])){
            $user=new usuario();
            $user->email=$_SESSION['user']['email'];
            $nombreDirectorio="img/anuncios/";

            if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
                $img=$_FILES['imagen'];
                $nombreFichero=$img['name'];
                $nuevo_nombre=explode(".",$nombreFichero);
                $idUnico=random_str(7);
                $nombreFichero="mygabinete_user".$idUnico.".".$nuevo_nombre[1];
                $nombreCompleto = $nombreDirectorio.$nombreFichero;
                move_uploaded_file($img['tmp_name'],$nombreCompleto);
            }else{
                echo "No se ha podido subir el fichero";
            }
            $user->nombre=$_POST['nombre'];
            $user->apellido=$_POST['apellido'];
            $user->ciudad=$_POST['ciudad'];
            $user->foto=$nombreCompleto;
            $user->updateUsuario($bd->link);
            $_SESSION['user']['nombre']=$_POST['nombre'];
            $_SESSION['user']['apellido']=$_POST['apellido'];
            $_SESSION['user']['ciudad']=$_POST['ciudad'];
            $_SESSION['user']['foto']=$nombreCompleto;
        }
        if(isset($_POST['crearAnun'])){
            //COMPROBAR SI TIENE ANUNCIOS 
            $user=new usuario();
            $user->email=$_SESSION['user']['email'];
            if(count($_FILES['imagen']['name'])<4){
                $anuncio=new anuncio();
                $anuncio->email_user=$_SESSION['user']['email'];
                $numId=$anuncio->getId($bd->link);
                if($numId['numId']==NULL) $numId['numId']='1';
                $nombreDirectorio="img/anuncios/".$numId['numId'];
                if(!is_dir($nombreDirectorio))
                mkdir($nombreDirectorio, 0777, true);
                $nombreDirectorio.="/";
                $fotos_url='';
                for ($i=0; $i < count($_FILES['imagen']['name']); $i++) { 
                    if(is_uploaded_file($_FILES['imagen']['tmp_name'][$i])){
                        $img=$_FILES['imagen'];
                        $nombreFichero=$img['name'][$i];
                        $nuevo_nombre=explode(".",$nombreFichero);
                        $idUnico=random_str(7);
                        $nombreFichero="mygabinete_$i".$idUnico.".".$nuevo_nombre[1];
                        $nombreCompleto = $nombreDirectorio.$nombreFichero;
                        move_uploaded_file($img['tmp_name'][$i],$nombreCompleto);
                        $fotos_url.=$nombreFichero."/";
                    }else{
                        echo "No se ha podido subir el fichero";
                    }
                }
                $anuncio->id=$numId['numId'];
                $anuncio->id_cat=$_POST['categoria'];
                $anuncio->titulo=$_POST['titulo'];
                $anuncio->subtitulo=$_POST['subtitulo'];
                $anuncio->descripcion=$_POST['descripcion'];
                $anuncio->contacto=$_POST['contacto'];
                $anuncio->fotos=$fotos_url;
                $anuncio->insert($bd->link);
            }else{
                echo "El limite de imgagenes son 4";
            }
        }
        // CAMBIAR
        $st->loged($_SESSION['user']['email']);
        $st->headerHTML();
        $perfil->perfilMenu();
        $st->menu();
        $st->section=$perfil->pintAccount();
    }else if(isset($_GET['detalles'])){
        $bd=new dbase();
        $anuncio=new anuncio();
        $coments=new comenta();
        $row=$anuncio->visitorAnuncio($bd->link,$_GET['detalles']);

        $visitor=new gabinet($_GET['detalles']);
        
        $comentarios=$coments->getAllComents($bd->link,$_GET['detalles']);
        $visitor->comentsAll($comentarios);
        $visitor->titulo=$row['titulo'];
        $visitor->subtitulo=$row['subtitulo'];
        $visitor->contacto=$row['contacto'];
        $visitor->descripcion=$row['descripcion'];
        $nuevo_nombre=explode("/",$row['fotos']);

        for($i=0;$i<(count($nuevo_nombre)-1);$i++){
            $datos[$i]="img/anuncios/".$row['id']."/".$nuevo_nombre[$i];
        }
        $visitor->fotos($datos);
        $st->loged($_SESSION['user']['email']);
        $st->headerHTML();
        $st->menu();
        $st->section=$visitor->pintGabinet();
 
    }else{
        /**
         * imprime todos anuncios 
         */
        $bd=new dbase();
        $consult=$bd->link->prepare("Select id, fotos, titulo, subtitulo, 
        ROUND( puntos/ votados,1) as puntos, votados
        From anuncio");
        $consult->execute();
        $row=$consult->fetchAll(PDO::FETCH_ASSOC);
        $anunciosRender = new anuncioRender();

        for($i=0;$i<count($row);$i++){
            $nuevo_nombre=explode("/",$row[$i]['fotos']);
            $img_url="img/anuncios/".$row[$i]['id']."/".$nuevo_nombre[0];
            if($row[$i]['puntos']==null) $anunciosRender->puntos=0;
            else $anunciosRender->puntos=$row[$i]['puntos'];
            $anunciosRender->id=$row[$i]['id'];
            $anunciosRender->fotos=$img_url;
            $anunciosRender->titulo=$row[$i]['titulo'];
            $anunciosRender->subtitulo=$row[$i]['subtitulo'];
            $anunciosRender->votados=$row[$i]['votados'];
            $st->section.=$anunciosRender->mostrar();
        } 
        $st->loged($_SESSION['user']['email']);
        $st->headerHTML();
        $st->menu();
    }
}else{
     /**
     * Acceso sin autorizacion.
     * 
     */
    if(isset($_POST['recoverPwd'])){
        //Recuperer la contraseña
        $bd=new dbase();
        $user=new usuario();
        $user->email=$_POST['email'];
        $paswd=$_POST['nuevoPwd'];
        $hash = password_hash($paswd, PASSWORD_DEFAULT);
        $user->passwd=$hash;
        $user->cambiarPwd($bd->link);
        $st->formEntrada();
    }else
    if(isset($_POST['access'])){
        //
        // al pulsar el boton de "entrar"
        $st->formEntrada();
        //
    }else
    if(isset($_POST['signup'])){
        //
        //registro
        //
        $bd=new dbase();
        $paswd=$_POST['password'];
        $hash = password_hash($paswd, PASSWORD_DEFAULT);
        $user=new $_POST['tipo']();

        $user->nombre=$_POST['nombre'];
        $user->apellido=$_POST['apellido'];
        $user->email=$_POST['email'];
        $user->ciudad=$_POST['ciudad'];
        $user->passwd=$hash;
        if($_POST['tipo']=="cliente"){
            $user->insertCliente($bd->link);
        }else if($_POST['tipo']=="profesional"){
            $data=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
            $user->fecha_nac=$data;
            $user->insertProf($bd->link);
        }
        /**
         * Despues del registro , tiene que pasar por autorizacion
         */
        $st->formEntrada();
        //redirect("/");
    }else
    if(isset($_POST['logIn'])){
        /**
         * Formulario de entrada
         */
        $bd=new dbase();
        $user=new usuario();
        $user->email=$_POST['email'];
        if(($fila=$user->exist($bd->link))&&(password_verify($_POST['password'], $fila['passwd']))){

            $_SESSION['user']=[
                'email'=>$fila['email'],
                'nombre'=>$fila['nombre'],
                'apellido'=>$fila['apellido'],
                'ciudad'=>$fila['ciudad'],
                'id_ciudad'=>$fila['id'],
                'foto'=>$fila['foto']
            ];
           /* $st->loged($_SESSION['user']['email']);
            $st->headerHTML();
            $st->menu();*/
            redirect("/");
        }else{
            $st->error="email y/o contraseña es incorecto";
            $st->valor=$_POST['email'];
            $st->formEntrada();
        }
    }else 
    if(isset($_GET['register'])){
        /**
         * muestra formulsario para registar
         */
            $bd=new dbase();
            $ciudades = new ciudad();
            $row=$ciudades->getCiudades($bd->link);
            $st->valor=drawSelect($row,"ciudad");
            $st->registrar();
    }else 
    if(isset($_GET['recover'])){
        $st->emailInro();
        if(isset($_POST['compEmail'])){
            $bd=new dbase();
            $user=new usuario();
            $user->email=$_POST['userEmail'];
            if($fila=$user->exist($bd->link)){
                $st->valor=$_POST['userEmail'];
                $st->formPwd();
                
            }else{
                $st->error="Usuario con este email no existe";
                $st->emailInro();
            }
        }
    }else 
    if(isset($_POST['votar'])){
        $st->formEntrada();
    }else 
    if(isset($_POST['user_coment'])){
        $st->formEntrada();
    }else 
    if(isset($_GET['account'])){
        $st->formEntrada();
    }else{
        $st->notloged();
        $st->headerHTML();
        $st->menu();
        $bd=new dbase();
        $consult=$bd->link->prepare("Select id, fotos, titulo, subtitulo, 
       ROUND( puntos/ votados,1) as puntos, votados
        From anuncio");
        $consult->execute();
        $row=$consult->fetchAll(PDO::FETCH_ASSOC);
        $anunciosRender = new anuncioRender();
        
        for($i=0;$i<count($row);$i++){
            $nuevo_nombre=explode("/",$row[$i]['fotos']);
            $img_url="img/anuncios/".$row[$i]['id']."/".$nuevo_nombre[0];
            if($row[$i]['puntos']==null) $anunciosRender->puntos=0;
            else $anunciosRender->puntos=$row[$i]['puntos'];
            $anunciosRender->id=$row[$i]['id'];
            $anunciosRender->fotos=$img_url;
            $anunciosRender->titulo=$row[$i]['titulo'];
            $anunciosRender->subtitulo=$row[$i]['subtitulo'];
            $anunciosRender->votados=$row[$i]['votados'];
            $st->section.=$anunciosRender->mostrar();
        }
    }
}
echo $st->head();
echo $st->pintHeader();
echo $st->pintMenu();
echo $st->pintSection();
echo $st->pintFooter();
?>
<script>
    $('.ui.checkbox').checkbox();
    $('.ui.rating')
        .rating({
            initialRating: 3,
            maxRating: 5,
            onRate:function (rating) {
                $.post("prueba.php",
                {
                    puntua:"1",
                    rate:rating,
                    cardId:$(this).attr("data-id")
                },
            function(data,status){
                console.log("Confirm");
            });
            $(this).rating('disable');
            }
        });

$('.toggle.example .rating').rating('enable');

$('.special.cards .image').dimmer({on: 'hover'});
</script>


