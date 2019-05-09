<?php

namespace application\controllers;
use application\core\Controller;
use application\lib\Users;
use application\lib\Db;

class AccountController extends Controller{

    public function before(){
        $this->view->layout='custom';
    }
    public function loginAction(){
        $email_inp='';
        if(isset($_POST['logIn'])){
            
            $bd=new Db;
            $user=new Users;
            $user->email=$_POST['email'];
            if(($fila=$user->exist($bd->link))&&(password_verify($_POST['password'], $fila['passwd']))){
                //echo"<h2> TODO GOOD</h2>";
                $_SESSION['email']=$fila['email'];
                $this->view->message('session',$_SESSION['email']);
                $this->view->redirect("/");
                
                /*$st->loged($_SESSION['email']);
                $st->section="<h1>Has entrado</h1>";*/
            }else{
                $email_inp=$_POST['email'];
                /*$st->error="email y/o password es incorecto";
                $st->formEntrada();
                $error="<script>
                    $('.login')
                    .form('set value', 'email', '".$_POST['email']."');
                </script>";
                $st->section=$error;*/
            }
             //$this->view->message('error',"form no funciona");
            //else
            //$this->view->locatin('/');
            //mail('krasiyruslan@gmail.com',"Prueba","A ver si funciona");
                //$this->view->message('success',"form funciona");
            
        }
        
        $this->view->render('Log In');
    }
 
    public function registerAction(){
        if(isset($_POST['signup'])){
                $bd=new Db;
                $data=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
                $paswd=$_POST['password'];
                $hash = password_hash($paswd, PASSWORD_DEFAULT);
                $user=new Users;

                $user->name=$_POST['first-name'];
                $user->lastName=$_POST['last-name'];
                $user->email=$_POST['email'];
                $user->pass=$hash;
                $user->birthDate=$data;
    
                $user->signUp($bd->link);
                $this->view->redirect("/");
                //debug($user);
            /*$_POST['first-name']="";
            
            $consult=$bd->link->prepare("SELECT * from clientes");
            $consult->execute();
            $fila=$consult->fetch(PDO::FETCH_ASSOC);
            echo $fila['email'];
            echo $user->name;*/
        }
        $this->view->render('New User');
        
    }
    
    public function recoveryAction(){
        $this->view->render('Recover your password');
        
    }
}
?>