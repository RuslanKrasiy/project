<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
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
        $perfil=new account();
        $user=new user();
        $user->email=$_SESSION['user']['email'];
        
        if($user->hasAnuncio($bd->link)>0){
            $perfil->crear="block";
        }else{
            $perfil->crear="none";
        }
 
        if(isset($_POST['crearAnun'])){
            //COMPROBAR SI TIENE ANUNCIOS 
            $user=new user();
            $user->email=$_SESSION['user']['email'];
            if($user->hasAnuncio($bd->link)!=0){
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
                
            }else{
                echo "No tienes derechos al publicar. Ya tienes un anuncio publicado.";
            }
            
            /*$anuncio->showAnuncio($bd->link);
            $perfil->perfilMenu();
            $perfil->pintAccount();
            $st->menu();
            $st->section=$perfil->pintAccount();*/

        }else
        if(isset($_POST['updateProfil'])){

        }else
        if(isset($_POST['cambPasswd'])){

        }
        else{
            
            
            

            //$perfil->pintAccount();
    
        }
        $bd=new dbase();
        $categorias = new categorias();
        $row=$categorias->getCategorias($bd->link);
        $perfil->valor=drawSelect($row,'categoria');// CAMBIAR
        $perfil->perfilMenu();
        $st->menu();
        $st->section=$perfil->pintAccount();
        
    }else
    if(isset($_GET['categorias'])){
        $st->section="ES categorias";
        $st->menu();
    }else
    if(isset($_GET['anuncio'])){
        $datos['anuncio']="";
        $bd=new dbase();
        $email=$_SESSION['user']['email'];
        $perfil=new account();
        $consult=$bd->link->prepare ("SELECT A.id ,A.fotos, A.titulo, A.subtitulo,
         sum(V.puntos) as puntos, count(V.puntos) as votados
        From anuncio A, puntos V
        where A.id=V.id_anuncio
        and A.email_user ='$email'
        ");
        $consult->execute();
        while($row=$consult->fetch(PDO::FETCH_ASSOC)){
            $datos['id']=$row['id'];
            $datos['titulo']=$row['titulo'];
            $datos['subtitulo']=$row['subtitulo'];
            $datos['puntos']=$row['puntos'];
            $datos['votados']=$row['votados'];
            //$datos['anuncio'].=$perfil->mostrar($datos);*/
            $nuevo_nombre=explode("/",$row['fotos']);
            var_dump($row);
            $datos['fotos']="img/anuncios/".$datos['id']."/".$nuevo_nombre[0];
            $st->section.=$perfil->mostrar($datos);
        }
            $st->menu();
           
    }else if(isset($_GET['detalles'])){
        $bd=new dbase();
        $anuncio=new anuncio($_SESSION['user']['email']);
        $coments=new comentarios();
        $row=$anuncio->visitorAnuncio($bd->link,$_GET['detalles']);

        $visitor=new gabinet($_GET['detalles']);
        $visitor->comentsAll($coments->getAllComents($bd->link,$_GET['detalles']));
        $visitor->titulo=$row['titulo'];
        $visitor->subtitulo=$row['subtitulo'];
        $visitor->contacto=$row['contacto'];
        $visitor->descripcion=$row['descripcion'];
        $nuevo_nombre=explode("/",$row['fotos']);

        for($i=0;$i<count($nuevo_nombre);$i++){
            $datos[$i]="img/anuncios/".$row['id']."/".$nuevo_nombre[$i];
        }
        $visitor->fotos($datos);
        
        $st->menu();
        $st->section=$visitor->pintGabinet();
        /*$datos['id']=$row['id'];
        $datos['titulo']=$row['titulo'];
        $datos['subtitulo']=$row['subtitulo'];
        $datos['puntos']=$row['puntos'];
        $datos['votados']=$row['votados'];
        //$datos['anuncio'].=$perfil->mostrar($datos);
        $nuevo_nombre=explode("/",$row['fotos']);
        $datos['fotos']="img/anuncios/".$row['id']."/".$nuevo_nombre[0];*/
        
    }else{
        $bd=new dbase();
        $email=$_SESSION['user']['email'];
        $perfil=new account();
        $consult=$bd->link->prepare("Select A.id,A.fotos,A.titulo,A.subtitulo, 
        SUM(P.puntos)as puntos,COUNT(P.puntos)as votados
        From anuncio A,puntos P
        where A.id=P.id_anuncio");
        $consult->execute();
        while($row=$consult->fetch(PDO::FETCH_ASSOC)){
            $datos['id']=$row['id'];
            $datos['titulo']=$row['titulo'];
            $datos['subtitulo']=$row['subtitulo'];
            $datos['puntos']=$row['puntos'];
            $datos['votados']=$row['votados'];
            //$datos['anuncio'].=$perfil->mostrar($datos);*/
            $nuevo_nombre=explode("/",$row['fotos']);
            $datos['fotos']="img/anuncios/".$row['id']."/".$nuevo_nombre[0];
            $st->section.=$perfil->mostrar($datos);
        }        
        $st->loged($_SESSION['user']['email']);
        $st->headerHTML();
        $st->menu();
    }
    if(isset($_POST['user_coment'])){
        $bd=new dbase();
        $comentarios=new comentarios();
        $comentarios->email=$_SESSION['user']['email'];
        $comentarios->id_anuncio=$_POST['id_anuncio'];
        $comentarios->texto=$_POST['comentario'];
        $comentarios->writeComent($bd->link);
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
        redirect("/");
    }
    if(isset($_POST['logIn'])){
        $bd=new dbase();
        $user=new user();
        $user->email=$_POST['email'];
        if(($fila=$user->exist($bd->link))&&(password_verify($_POST['password'], $fila['passwd']))){

            $_SESSION['user']=[
                'email'=>$fila['email'],
                'nombre'=>$fila['nombre'],
                'apellido'=>$fila['apellido'],
                'ciudad'=>$fila['ciudad'],
                'publicacion'=>$fila['publicacion'],
                'fecha_nac'=>$fila['fecha_nac'],
                'foto'=>$fila['foto']
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
  





?>




<script>
    $('.ui.checkbox')
    .checkbox()
    ;
    $('.ui.rating')
  .rating({
    initialRating: 3,
    maxRating: 5,
    onRate:function (rating) {
    console.log(rating);
    $(this).rating('disable');
    }
  })
;
    $('.toggle.example .rating')
  .rating('enable')
;
    $('.special.cards .image').dimmer({
  on: 'hover'
});
/*var aim=window.location.href;

var sst=aim.indexOf("/?");
console.log(sst);
var loc=aim.substring(sst,aim.length);
var menu=document.getElementById("main");
//if($("#main .item").attr("href")==loc)
var nodo=menu.querySelector("a[href='"+loc+"']");
nodo.classList.add("active");*/

/*if($('#comment')){
    $(this).click(function(){
        
        var div=$("<div></div>").attr('class','comment');
        var a=$("<a></a>").attr("class","avatar");
        var i=$("<i></i>").attr("class","user icon");
        a.append(i);
        var div1=$("<div></div>").attr('class','content');
        var a1=$("<a></a>").attr("class","author").text("Ruslan Krasiy");
        var div2=$("<div></div>").attr('class','metadata');
        var div3=$("<div></div>").attr("class","date").text(new Date());
        div2.append(div3);
        var div2=$("<div></div>").attr('class','text');
        var texto=$("#texto").text();
        div2.text(texto);
        var div4=$("<div></div>").attr("class","actions");
        var a3=$("<a></a>").attr("class","reply").text("Reply");
        div4.append(a3);
        div1.append(a1,div2,div3,div4);
        div.append(a,div1);
        $('.ui.comments').append(div);


        div.append(a);
    });
}*/
</script>





