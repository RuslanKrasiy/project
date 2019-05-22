<?php
class page{

    private $header="";
    private $menu="";
    private $user="";
    private $section="";
    private $footer="";
    
    private $valor="";
    
    private $error="";

    private $nombre='';
    private $apellido='';
    private $systemError="";
    private $regError="hidden";

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
    /**
     * HEAD DE LA PAGINA( LINK,SCRIPT)
     */
    public function head(){
        $head="<!Doctype html>";
        $head.="<html lang='Es-es'>";
        $head.="<head>";
        $head.="<title>Centro de Estetica</title>";
        $head.="<meta charset='utf-8'>";
        $head.="<link rel='icon' type='image/png' href='public/images/g54501.png'>";
        $head.="<link rel='stylesheet' type='text/css' href='public/semantic/out/semantic.min.css'>";
        $head.="<script src='public/scripts/jquery-3.1.1.min.js'></script>";
        $head.="<script src='public/semantic/out/semantic.min.js'></script>";
        $head.="<link rel='stylesheet' type='text/css' href='public/style/main.css'>";
        $head.="</head>";
        $head.="<body>";
        return $head;
    }
    /**
     * CBECERA DE LA PAGINA
     */
    public function headerHTML(){
        $head="<header class='ui fluid container blue inverted segment' id='hed'>";
        $head.="<div class='ui grid'>";
        $head.=" <div class='four wide mobile three wide tablet two wide computer column'><img src='public/images/g511.png' width='100%'></div>";
        $head.="<div class='twelve wide mobile thirteen wide tablet fourteen wide computer column' style='text-align:right'>";
        
        
        $head.="<div>";
        $head.=$this->user;
        $head.="</div>";
        $head.="</div>";
        $head.="</div>";
        $head.="</header>";
        return $this->header=$head;
    }
    /**
     * BARA DE MENU
     */
    public function menu(){
        $menu="<nav class='ui fluid container' >";
        $menu.="<div class='ui secondary pointing menu' id='main'>";
        
        $menu.="<div class='right menu'>";
        $menu.="<a class='item'  href='/'>Home</a>";
        $menu.="<a class='item' href='/?account=1'>Mi perfil</a> </div>";
        $menu.="</div></nav>";
        $menu.="<section class='ui container'>";
        return $this->menu=$menu;
    }
    /**
     * EN CABECERA MUESTRA BOTON DE SALIDA
     */
    public function loged($email){
        
        $log="<span class='item'>$email</span>";
        $log.="<i class='user circle large icon'></i>";
        $log.="<form method='post' class='ui form' action='/'>";
        $log.="<input type='submit' name='logOut' value='Salir' class='ui mini button'></form>";
        $this->user=$log;
    }
    /**
     * EN CABECERA MUESTRA BOTON DE ENTRADA
     */
    public function notloged(){
        $log="<form method='post' class='ui form' action='/'>";
        $log.="<input type='submit' name='access' value='Entrar' class='ui mini button'></form>";
        $this->user=$log;
    }
    /**
     * FORMULARIO PARA ENTRAR(AUTORIZACION DE USUARIO)
     */
    public function formEntrada(){
        $form="<section class='ui fluid container'>";
        $form.="<div class='ui middle aligned center aligned grid'>";
        $form.="<div class='column' id='login'>";
        $form.="<h2 class='ui blue header'>";
        $form.="Entrar";
        $form.="</h2>";
        $form.="<form method='post' class='ui large form login' action=''>";
        $form.="<div class='ui stacked segment'>";
        $form.="<div class='required field'>";
        $form.="<div class='ui left icon input'>";
            $form.="<i class='user icon'></i>";
            $form.="<input type='text' name='email' placeholder='E-mail address' value=".$this->valor.">";
        $form.="</div>";
        $form.="</div>";
        $form.="<div class='required field'>";
        $form.="<div class='ui left icon input'>";
            $form.="<i class='lock icon'></i>";
            $form.="<input type='password' name='password' placeholder='Password'>";
        $form.="</div>";
        $form.="</div>";
        $form.="<input type='submit' class='ui fluid large teal submit button' name='logIn' value='Entrar'>";
        $form.="</div>";
        $form.="<div class='ui error message'></div>";

        $form.="</form>";
        $form.="<p>".$this->error."</p>";
        $form.="<div class='ui message'>";
        $form.="<a href='/?recover=1'>¿Olvidado contraseña? </a>";
        //$form.="<div class='ui divider'> / </div>";
        $form.="<a href='/?register=1'> Crear cuenta</a>";
        $form.="</div>";
        $form.="</div>";
        
        $form.="</div>";
    
        $form.="<script src='/public/scripts/form_ent.js'></script>";
        $this->section.=$form;
    }
    /**
     * FORMULARIO PARA REGISTRAR NUEVO USUAIRO
     */
    public function registrar(){
        $form="<section class='ui fluid container'>";
        $form.="<div class='ui container'>";
        $form.="<div class='ui blue inverted segment'>";
        $form.="<h4 class='ui header'>Nueva cuenta</h4>";
        $form.="</div>";
        $form.="<form method='post' class='ui form signup' action=''>";
        
        $form.="<div class='two fields'>";
        $form.="<div class='required field'>";
        $form.="<label>Nombre</label>";
            $form.="<div class='field'>";
                $form.="<input type='text' name='nombre' 
                    placeholder='Nombre' value='$this->nombre'></div></div>";
        $form.="<div class='required field'>";
            $form.="<label>Apellido</label>";
            $form.="<div class='field'>";
                $form.="<input type='text' name='apellido' 
                placeholder='Apellido' value='$this->apellido'></div></div>";
        $form.="</div>";  
        
        $form.="<div class='two fields'>";

        $form.="<div class='required field'>";
        $form.="<label>Correo electronico</label>";
                $form.="<input type='email' name='email' 
                    placeholder='micorreo@gmail.com' value=''></div>";
        $form.="<div class='required field'>";
        $form.="<label>Confirmar correo electronico</label>";
                $form.="<input type='email' name='email2' 
                placeholder='micorreo@gmail.com' value=''></div></div>";

        $form.="<div class='two fields'>";
       
            $form.="<div class='required field'>";
            $form.="<label>Contraseña</label>";
                $form.="<input type='password' name='password'
                    placeholder='Contraseña'></div>";

            
            $form.="<div class='required field'>";
            $form.="<label>Confirmar contraseña</label>";
                $form.="<input type='password' name='password2'
                placeholder='Repite tu contraseña'></div>";
        $form.="</div>";

            
        
            $form.="<div class='required field'>";
            $form.="<label>Ciudad</label>";
                $form.="<div class='four wide field'>";
            
                $form.=$this->valor;
        $form.="</div></div>";



        $form.="<div class='required field'>";
        $form.="<label>Tipo de cuenta</label>";
        $form.="<div class='four wide field'>";
        $form.="<select class='ui search dropdown' id='tipoCuenta' name='tipo'>";
        //$form.="<option value=''>Selecione..</option>";
        $form.="<option value='cliente'  selected='selected'>Basica</option>";
        $form.="<option value='profesional'>Avanzada (Para autonomos)</option>";
        $form.="</select>";
        $form.="</div></div>";



        $form.="<div class='required field' id='fecha-nac' style=''>";
       
        $form.="</div>";

            $form.="<div class='six wide inline field'>";
                    $form.="<label>Al hacer clic en Registrar , aceptas nuestras <a href='#'>Condiciones</a>
                    . Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la 
                    <a href='politica_datos.php'>Política de datos</a>, así como el uso que hacemos de la cookies y tecnologías similares
                    en nuestra <a href='politica_cookies.php'>Política de cookies</a>.</label>";
                $form.="</div>";
            

            $form.="<input type='submit' class='ui blue submit button' name='signup' value='Registrar'>";
            $form.="<a class='ui button' href='/'>Cancelar</a>";
            $form.="<div class='ui $this->regError message'><p>ERROR: Usuario con este email ya existe! 
              Por favor introduce otro correo electronico</p></div>";
        $form.="</form>";
        //$form.="<h3 class='ui header'>$this->regError</h3>";
        $form.="</div>";
        
        $form.="<script src='/public/scripts/form_reg.js'></script>";
        $this->section.=$form;
    }
    /**
     * PINTA EL FOOTER
     */
    public function pintFooter(){
        $footer="</section><footer><p id='systemError'>$this->systemError</p>";
        $footer.="</footer>";
        $footer.="</body></html>";
        return $footer;
    }
    /**
     * FORMULARIO PARA RENOVAR LA CONTRASEÑA 
     * PARA NO AUTORIZADO
     */
    public function emailInro(){
        $form="<section class='ui fluid container'>";
        $form.="<div class='ui blue inverted segment'>";
        $form.="<h4 class='ui header'>Recuperar contraseña</h4>";
        $form.="</div>";
        $form.="<div class='ui container'>";
        $form.="<form class='ui form' action='' method='post' id='introForm'>";
        $form.="<div class='eight wide field'>";
        $form.="<div class='required field'>";
        $form.="<label>Correo electronico</label>";
        $form.="<input type='email' placeholder='joe@schmoe.com' name='userEmail'>";
        $form.="</div></div>";
        $form.="<label class='ui header'>$this->error</label><br>";
        $form.="<input type='submit' class='ui submit blue button' name='compEmail' value='Submit'>";
        $form.="<a class='ui button' href='/'>Cancelar</a>";
        $form.="<div class='ui error message'></div>";
        $form.="</form></div>";
        $form.="<script src='public/scripts/recover.js'></script>";
        return $this->section=$form;
    }
   /**
     * FORMULARIO PARA RENOVAR LA CONTRASEÑA 
     * A TRAVES DE "MI PERFIL"
     */
    public function formPwd(){
        $menu="<section class='ui fluid container'>";
        $menu.="<div class='ui blue inverted segment'>";
        $menu.="<h4 class='ui header'>Recuperar contraseña</h4>";
        $menu.="</div>";
        $menu.="<form class='ui form segment success' action='' method='post' >";
        $menu.="<div class='two fields'>";
        $menu.="<input type='hidden' name='email' value='$this->valor'>";
        $menu.="<div class='required field'>";
        $menu.="<label>Nueva contraseña</label>";
        $menu.="<input placeholder='Nueva contraseña' type='password' id='nuevoPwd' name='nuevoPwd'>";

        $menu.="</div>";
       
        $menu.="<div class='required field'>";
        $menu.="<label>Repite contraseña</label>";
        $menu.="<input placeholder='Repetir contraseña' type='password' name='repitPwd' >";

        $menu.="</div></div>";            
        $menu.="<input type='submit' class='ui submit blue button'
        id='recoverPwd' name='recoverPwd' value='Recuperar'>";
        $menu.="<a class='ui button' href='/'>Cancelar</a>";
        $menu.="<div class='ui error message'></div>";
        $menu.="</form></div>";
        
        $menu.="<script src='public/scripts/recover.js'></script>";
        return $this->section=$menu;
    }
    /**
     * PINTA EL CONTENEDOR SECTION
     */
    public function pintSection(){
        return $this->section;
    }
    /**
     * PINTA LA CABECERA
     */
    public function pintHeader(){
        return $this->header;
    }
    /**
     * PINTA EL MENU
     */
    public function pintMenu(){
        return $this->menu;
    }
    
}




?>