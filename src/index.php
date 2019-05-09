<?php
session_start();
    //phpinfo();
    include "vista/page.php";
    //include "vista/form.php";
    //include "vista/footer.php";
    spl_autoload_register(function ($clase){
        require_once ('class/'.$clase.'.php');
    });
    $st=new page();
    echo $st->pintHead();
if(isset($_POST['logOut'])){
    session_destroy();
}
if(isset($_SESSION['user'])){

}else{
    
    if(isset($_POST['signup'])){
        $bd=new dbase();
        $data=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
        $paswd=$_POST['password'];
        $hash = password_hash($paswd, PASSWORD_DEFAULT);
        $user=new client();

        $user->name=$_POST['first-name'];
        $user->lastName=$_POST['last-name'];
        $user->email=$_POST['email'];
        $user->pass=$hash;
        $user->birthDate=$data;

        $user->signUp($bd->link);
        $_POST['first-name']="";
        
        $consult=$bd->link->prepare("SELECT * from clientes");
		$consult->execute();
        $fila=$consult->fetch(PDO::FETCH_ASSOC);
        echo $fila['email'];
        echo $user->name;
    }
    if(isset($_POST['logIn'])){
        $bd=new dbase();
        $user=new client ();
        $user->email=$_POST['email'];
        if(($fila=$user->exist($bd->link))&&(password_verify($_POST['password'], $fila['passwd']))){
            //echo"<h2> TODO GOOD</h2>";
            $_SESSION['email']=$fila['email'];

            $st->loged($_SESSION['email']);
            
            $st->section="<h1>Has entrado</h1>"; // h1
        }else{
            $st->error="email y/o contraseña es incorecto";
            $st->valor=$_POST['email'];
            $st->formEntrada();
        }
    }else if(isset($_GET['new_user'])){
            $st->registrar();
        }else if(isset($_GET['ctx'])){
            $st->section="<h1>REcuperar contraseña</h1>";// H1
    }else{
        $st->formEntrada();
        //include "vista/ent-form.php";
    }

}


echo $st->pintSection();
echo $st->pintFooter();
//echo random_str(); 
    
function random_str($num=30){
    return substr(str_shuffle('0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM'),0,$num);
}

?>
<script>
    $('.ui.checkbox')
    .checkbox()
    ;
</script>


