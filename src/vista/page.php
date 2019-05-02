<?php
class page{
    private $header="";
    private $section="";
    private $footer="";

    private $error="";
    private $lacation="";

    public function __construct(){

    }
    public function __get($attr){
        if(property_exists(__CLASS__, $attr)){
            return $this->$attr;
        }else{
            return NULL;
        }
    }
    
    public function __set($attr,$value){
        if(property_exists(__CLASS__, $attr)){
            return $this->$attr=$value;
        }else{
            return NULL;
        }
    }
    public function pintHead(){
        $head="<!Doctype html>";
        $head.="<html lang='Es-es'>";
        $head.="<head>";
        $head.="<title>Centro de Estetica</title>";
        $head.="<meta charset='utf-8'>";
        $head.="<link rel='icon' type='image/png' href='img/g54501.png'>";
        $head.="<link rel='stylesheet' type='text/css' href='semantic/out/semantic.min.css'>";
        $head.="<script src='semantic/jquery-3.4.0.min.js'></script>";
        $head.="<script src='semantic/out/semantic.min.js'></script>";
        $head.="</head>";
        $head.="<body>";

        $head.="<header class='ui fluid container blue inverted segment'>";
        $head.="<div class='ui two column doubling stackable grid container'>";
        $head.="<div class='column'><img src='img/g511.png'></div>";
        $head.="<div class='column'>";

        
        $head.="<div class='ui right aligned'>";
        $head.=$this->header;
        //$head.="<p>Segundo</p>";
        //$head.="<button type='submit' class='ui button' name='logOut'>Salir</button>";
        $head.="</div>";
        $head.="</div>";
        $head.="</div>";
        $head.="</header>";
        $head.="<section class='ui container'>";
        return $head;
    }
    public function formEntrada(){
        $form="<div class='ui container'>";
        $form.="<form method='post' class='ui form login' action=''>";
        $form.="<div class='required field'>";
        //$form.="<label>Nombre</label>";
        $form.="<div class='two fields'>";
            $form.="<div class='field'>";
            $form.="<input type='email' name='email' 
            placeholder='Correo electronico'></div>";
            $form.="<div class='field'>";
                $form.="<input type='password' name='password'
                placeholder='Contraseña'></div>";
        $form.="</div>";
        $form.="</div>";
        $form.="<p>$this->error</p>";
        $form.="<input type='submit' class='ui blue submit button' name='logIn' value='Entrar'>";
        $form.="<a class='ui button' href='/?new_user=1'>Crear cuenta</a>";
        $form.="<a class='ui button' href='/?ctx=recover'>¿Olvidado contraseña?</a>";
        
        $form.="<div class='ui error message'></div>";
        $form.="</form>";
        $form.="</div>";
        $form.="<script src='js/form_ent.js'></script>";
        $this->section=$form;
    }
    public function loged($email){
        $log="<div class='item'>";  
        $log.="<span class='item'>$email</span>";
        $log.="<i class='user circle large icon'></i>";
        $log.="<form method='post' class='ui form' action='index.php'>";
        $log.="<input type='submit' name='logOut' value='Salir'></form></div>";

        $this->header=$log;
    }
    public function registrar(){
        $form="<div class='ui container'>";
        $form.="<form method='post' class='ui form signup' action=''>";
        $form.="<h4 class='ui dividing header'>Crea una cuenta</h4>";
        $form.="<div class='required field'>";
        //$form.="<label>Nombre</label>";
            $form.="<div class='two fields'>";
                $form.="<div class='field'>";
                    $form.="<input type='text' name='first-name' 
                        placeholder='Nombre' value=''></div>";
                $form.="<div class='field'>";
                    $form.="<input type='text' name='last-name' 
                        placeholder='Apellido'></div>";
            $form.="</div>";
        $form.="</div>";   
        $form.="<div class='required field'>";
            $form.="<div class='fields'>";
                $form.="<div class='twelve wide field'>";
                    $form.="<input type='email' name='email' 
                        placeholder='Correo electronico' value=''></div>";
            $form.='</div>';
            $form.="<div class='required field'>";
                $form.="<div class='six wide field'>";
                $form.="<input type='password' name='password'
                placeholder='Contraseña' value=''></div>";
            $form.="</div>";

            $form.="<div class='three fields'>";
                $form.="<label>Fecha de nacimiento</label>";
                $form.="<div class='two wide required field'>";
                    $form.="<select class='ui search dropdown' name='day'>";
                    $form.="<option value=''>Dia</option>";
                        for($i=1;$i<32;$i++){
                            $form.="<option value='$i'>$i</option>";
                        }
                        
                    $form.="</select>";
                $form.="</div>";

                $form.="<div class='two wide required field'>";
                    $form.="<select class='ui search dropdown'  name='month'>";
                        $form.="<option value=''>Mes</option>";
                        $form.="<option value='1'>Enero</option>";
                        $form.="<option value='2'>Febrero</option>";
                        $form.="<option value='3'>Marzo</option>";
                        $form.="<option value='4'>Abril</option>";
                        $form.="<option value='5'>Mayo</option>";
                        $form.="<option value='6'>Junio</option>";
                        $form.="<option value='7'>Julio</option>";
                        $form.="<option value='8'>Agosto</option>";
                        $form.="<option value='9'>Septiembre</option>";
                        $form.="<option value='10'>Octubre</option>";
                        $form.="<option value='11'>Noviembre</option>";
                        $form.="<option value='12'>Deciembre</option>";
                    $form.="</select>";
                $form.="</div>";

            $form.="<div class='two wide required field'>";
                    $form.="<select class='ui search dropdown' name='year'>";
                        $form.="<option value=''>Año</option>";
                        for($i=2010;$i>1955;$i--){
                            $form.="<option value='$i'>$i</option>";
                        }
                        
                    $form.="</select>";
                $form.="</div>";
            
            $form.="</div>";

            $form.="<div class='inline field'>";
                    $form.="<label>Al hacer clic en Registrar , aceptas nuestras <a href='#'>Condiciones</a>
                    . Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la 
                    <a href='politica_datos.php'>Política de datos</a>, así como el uso que hacemos de la cookies y tecnologías similares
                    en nuestra <a href='politica_cookies.php'>Política de cookies</a>.</label>";
                $form.="</div>";
            $form.="</div>";
            $form.="<input type='submit' class='ui blue submit button' name='signup' value='Registrarse'>";
            $form.="<a class='ui button' href='index.php'>Cancelar</a>";
            $form.="<div class='ui error message'></div>";
        $form.="</form>";
        $form.="</div>";
        $form.="<script src='js/form_reg.js'></script>";
        $this->section=$form;
    }
    public function pintFooter(){
        $footer="</section><footer class='ui fluid raised very padded container inverted segment'style='margin-bottom:0;'>";
        $footer.="<div class='ui three column doubling stackable grid container'>";
            $footer.="<div class='column'>";
                $footer.="<h4>Informacion</h4>";
                $footer.="<div class='ui padded text inverted segment'>";
                    $footer.="<p><a href='#'>Nuestro equipo</a></p>";
                    $footer.="<p><a href='#'>Política de datos</a></p>";
                    $footer.="<p><a href='#'>Política de cookies</a></p>";
                $footer.="</div>";
            $footer.="</div>";
            $footer.="<div class='column'>";
                $footer.="<h4>Cantacto</h4>";
                $footer.="<div class='ui padded text inverted segment'>";
                    $footer.="<p><a href='#'>soporte@gmail.com</a></p>";
                    $footer.="<p>av.Blasco Ibañes 128, 1</p>";
                    $footer.="<p>Valencia, 46014</p>";
                $footer.="</div>";
            $footer.="</div>";
            $footer.="<div class='column'>";
                $footer.="<h4>Columnas</h4>";
                $footer.="<div class='ui padded text inverted segment'>";
                    $footer.="<p>Columnas</p>";
                $footer.="</div>";
            $footer.="</div>";
        $footer.="</div>";
        $footer.="<div class='ui divider'></div>";
        $footer.="<div class='ui fluid center aligned container'>";
            $footer.="<p>Diseñado por : <a href='#' class=''>Ruslan Krasiy</a></p>";
        $footer.="</div>";
        $footer.="</footer>";
        $footer.="</body></html>";
        return $footer;
    }
    public function pintSection(){
        return $this->section;
    }
}




?>