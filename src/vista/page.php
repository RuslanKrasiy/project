<?php
class page{

    private $header="";
    private $menu="";
    private $user="";
    private $section="";
    private $footer="";
    
    private $valor="";// form entrada
    
    private $error="";
    private $location="";
    private $disable1="";
    private $disable2="";

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
    public function headerHTML(){
        $head="<header class='ui fluid container blue inverted segment' id='hed'>";
        $head.="<div class='ui grid'>";
        $head.=" <div class='four wide mobile three wide tablet two wide computer column'><img src='public/images/g511.png' width='100%'></div>";
        $head.="<div class='twelve wide mobile thirteen wide tablet fourteen wide computer column' style='text-align:right'>";
        
        
        $head.="<div>";
        $head.=$this->user;
        //$head.="<p>Segundo</p>";
        //$head.="<button type='submit' class='ui button' name='logOut'>Salir</button>";
        $head.="</div>";
        $head.="</div>";
        $head.="</div>";
        $head.="</header>";
        return $this->header=$head;
    }
    public function menu(){
        $menu="<nav class='ui fluid container' >";
        $menu.="<div class='ui secondary pointing right menu' id='main'>";
        $menu.="<a class='item'  href='/'>Home</a>";
        $menu.="<a class='item' href='/?categorias=1'>Categorias</a>";
        $menu.="<a class='item' href='/?account=1'>Mi Gabinete</a>";
        $menu.="</div></nav>";
        $menu.="<section class='ui fluid container'>";
        return $this->menu=$menu;
    }
    public function loged($email){
        
        $log="<span class='item'>$email</span>";
        $log.="<i class='user circle large icon'></i>";
        $log.="<form method='post' class='ui form' action='/'>";
        $log.="<input type='submit' name='logOut' value='Salir' class='ui mini button'></form>";
        $this->user=$log;
    }
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
    public function registrar(){
        $form="<section class='ui fluid container'>";
        $form.="<div class='ui container'>";
        $form.="<form method='post' class='ui form signup' action=''>";
        $form.="<h4 class='ui dividing header'>Nueva cuenta</h4>";
        
        $form.="<div class='required field'>";
        //$form.="<label>Nombre</label>";
        $form.="<label>Nombre</label>";
            $form.="<div class='six wide field'>";
                $form.="<input type='text' name='nombre' 
                    placeholder='Nombre' value=''></div>";
            $form.="<div class='six wide field'>";
                $form.="<input type='text' name='apellido' 
                placeholder='Apellido'></div>";
        $form.="</div>";  
        
       
        $form.="<div class='required field'>";
        $form.="<label>Email</label>";
            $form.="<div class='six wide field'>";
                $form.="<input type='email' name='email' 
                    placeholder='Correo electronico' value=''></div>";

            $form.="<div class='six wide field'>";
                $form.="<input type='email' name='email2' 
                placeholder='Repite tu correo electronico' value=''></div>";
        $form.='</div>';

        
        $form.="<div class='required field'>";
        $form.="<label>Contraseña</label>";
            $form.="<div class='six wide field'>";
                $form.="<input type='password' name='password'
                    placeholder='Contraseña'></div>";
            $form.="<div class='six wide field'>";
                $form.="<input type='password' name='password2'
                placeholder='Repite tu contraseña'></div>";
        $form.="</div>";

            
        
            $form.="<div class='required field'>";
            $form.="<label>Ciudad</label>";
                $form.="<div class='four wide field'>";
            
                $form.=$this->valor;
        $form.="</div></div>";
        $form.="<div class='required field'>";
        $form.="<label>Fecha de nacimiento</label>";
            $form.="<div class='three fields'>";
                
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
            $form.="</div>";

            $form.="<div class='six wide inline field'>";
                    $form.="<label>Al hacer clic en Registrar , aceptas nuestras <a href='#'>Condiciones</a>
                    . Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la 
                    <a href='politica_datos.php'>Política de datos</a>, así como el uso que hacemos de la cookies y tecnologías similares
                    en nuestra <a href='politica_cookies.php'>Política de cookies</a>.</label>";
                $form.="</div>";
            

            $form.="<input type='submit' class='ui blue submit button' name='signup' value='Registrarse'>";
            $form.="<a class='ui button' href='/'>Cancelar</a>";
            $form.="<div class='ui error message'></div>";
        $form.="</form>";
        $form.="</div>";
        $form.="<script src='/public/scripts/form_reg.js'></script>";
        $this->section.=$form;
    }
    public function pintFooter(){
        $footer="</section><footer>";
        /*$footer="</section>
        <footer class='ui fluid raised very padded container inverted segment'style='margin-bottom:0;'>";
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
        $footer.="</div>";*/
        $footer.="</footer>";
        $footer.="</body></html>";
        return $footer;
    }

    public function pintSection(){
        return $this->section;
    }
    public function pintHeader(){
        return $this->header;
    }
    public function pintMenu(){
        return $this->menu;
    }
    public function account(){
       
        
    }
    public function anuncio(){
        $sst="<div class='ui card'>";
        $sst.="<div class='image'>";
        $sst.="<a href='?id=".$this->valor['id']."'>";
        $sst.="<img src=".$this->valor['fotos'].">";
        $sst.="</div>";
        $sst.="<div class='content'>";
        $sst.="<div class='header'>".$this->valor['titulo']."</div>";
        $sst.="<div class='description'>".$this->valor['subtitulo']."</div>";
        $sst.="</div>";
        $sst.="<div class='ui two bottom attached buttons'>";
        $sst.="<div class='ui button'>";
        $sst.="<i class='add icon'></i>Queue";

        $sst.="</div>";
        $sst.="<div class='ui primary button'>";
        $sst.="<i class='play icon'></i>Watch";

        $sst.="</div>";
        $sst.="</div>";
        $sst.="</div>";
        $sst.="</a>";
        $sst.="<div class='ui popup'>";
        $sst.="<div class='header'>Puntuación de usuario</div>";
        $sst.="<div class='ui star rating' data-rating=".$this->valor['puntos']."></div>";
        $sst.="</div>";
    
        return $sst;
    }
    
}




?>