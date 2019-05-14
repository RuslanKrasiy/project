<?php
class account{
    private $menu="";
    private $body;
    private $head;
    private $menuItem=['info','passwd','edit','crear','mostrar'];
    private $valor='';
    private $crear='';
    private $mostrar="";
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
    public function info(){
        $menu.="<div class='ui segment hidden-cont' id='info'>";
        $menu.="<h4 class='ui dividing header'>Infomación</h4>";
        
        $menu.="<div class='ui list'>";
        $menu.="<div class='item'>";
        $menu.="<div class='header'>Nombre</div>".$_SESSION['user']['nombre'];

        $menu.="</div>";
        $menu.="<div class='item'>";
        $menu.="<div class='header'>Apellido</div>".$_SESSION['user']['apellido'];
        
        $menu.="</div>";
        $menu.="<div class='item'>";
        $menu.="<div class='header'>Correo electronico</div>".$_SESSION['user']['email'];
        $menu.="</div>";
        $menu.="<div class='item'>";
        $menu.="<div class='header'>Ciudad</div>".$_SESSION['user']['ciudad'];
        $menu.="</div>";
        $menu.="<div class='item'>";
        $menu.="<div class='header'>Fecha de nacimiento</div>".$_SESSION['user']['fecha_nac'];
        $menu.="</div>";
        $menu.="</div>";
        $menu.="</div>";
    }
    public function passwd(){
        $menu.="<div class='ui segment hidden-cont' id='passwd'>";
        $menu.="<div class='ui small form'>";
        $menu.="<h4 class='ui dividing header'>Cambiar contraseña</h4>";
        $menu.="<div class='required fields'>";

        $menu.="<input placeholder='Contraseña actual' type='password'>";

        $menu.="</div>";
        $menu.="<div class='required fields'>";

        $menu.="<input placeholder='Nueva contraseña' type='password'>";

        $menu.="</div>";
        $menu.="<div class='required fields'>";

        $menu.="<input placeholder='Repetir contraseña' type='password'>";

        $menu.="</div>";
        $menu.="<input type='submit' class='ui submit button right floated' name='cambPasswd' value='Cambiar'>";
        $menu.="</div>";
        $menu.="</div>";
        return $menu;
    }
    public function edit(){
        $menu.="<div class='ui segment hidden-cont' id='edit'>";
        $menu.="<div class='ui small form'>";
        $menu.="<h4 class='ui dividing header'>Editar perfil</h4>";
        $menu.="<div class='required fields'>";

        $menu.="<input placeholder='Nombre' type='text' value='".$_SESSION['user']['nombre']."'>";

        $menu.="</div>";
        $menu.="<div class='required fields'>";

        $menu.="<input placeholder='Apellido' type='text' value='".$_SESSION['user']['apellido']."'>";

        $menu.="</div>";

        $menu.="<div class='five wide required field'>";
        $menu.="<select class='ui search dropdown' name='year'>";
        $menu.="<option value=''>Ciudades</option>";
        $menu.="<option value=''>Valencia</option>";
        $menu.="</select>";
        $menu.="</div>";

        $menu.="<div class='required fields'>";
        $menu.="<div class='field'>";
        $menu.="<input placeholder='Subir foto' type='text'>";
        $menu.="</div>";
        $menu.="</div>";
        $menu.="<input type='submit' class='ui submit button right floated' name='updateProfil' value='Cambiar'>";
        $menu.="</div>";
        $menu.="</div>";
        return $menu;
    }
    public function crear(){
        $menu.="<div class='ui segment hidden-cont' id='crear'>";
        $menu.="<h4 class='ui dividing header'>Crear anuncio</h4>";
        $menu.="<form method='post' class='ui large form login' action=''>";
        $menu.="<input type='hidden' value='".$_SESSION['user']['id']."' name='id_user'>";

        $menu.="<div class=''>";
        $menu.="<div class='five wide required field'>";
        $menu.="<label>Categoria</label>";
        $menu.=$this->valor;
        $menu.="</div>";
        $menu.="<div class='required field'>";
        $menu.="<label>Titulo</label>";

        $menu.="<input placeholder='Titulo' type='text' name='titulo'>";

        $menu.="</div>";
        $menu.="<div class='required field'>";
        $menu.="<label>Subtitulo</label>";

        $menu.="<input placeholder='Subtitulo' type='text' name='subtitulo'>";

        $menu.="</div>";
        $menu.="<div class='sixteen wide required field right floated'>";
        $menu.="<label>Descripción</label>";


        $menu.="<textarea name='descripcion'></textarea>";

        $menu.="</div>";
        $menu.="<div class='required field'>";
        $menu.="<label>Fotos</label>";

        $menu.="<input placeholder='Subir fotos' type='file' name='foto'>";

        $menu.="</div>";
        $menu.="<input type='submit' class='ui fluid large teal submit button' name='crearAnun' value='Crear anuncio'>";
        $menu.="</div>";
        $menu.="<div class='ui error message'></div>";
        $menu.="</form>";
        $menu.="</div>";
        return $menu;
    }
    public function mostrar(){
        $menu.="<div class='ui segment hidden-cont' id='anuncio'>";
        $menu.="<h1>Mostar anuncio</h1>";
        $menu.="</div>";
        return $menu;
    }
    public function perfilMenu(){
        $menu="<section class='ui fluid container'>";
        $menu.="<div class='ui container'>";
        $menu.="<h3 class='ui block header' style='text-align:center;'>".$_SESSION['user']['nombre']." ".$_SESSION['user']['apellido']."</h3>";
        $menu.="<div class='ui grid'>";
        $menu.="<div class='five wide column'>";
        $menu.="<div class='item' style='text-align:center;'>";

        $menu.="<i class='massive user icon'></i>";
        $menu.="<img class='ui medium circular image' src=''>";
        $menu.="</div>";
        $menu.="<div class='ui vertical fluid tabular menu'>";
        $menu.="<a class='active item' href='#'data-name='info'>Infomación</a>";
        $menu.="<a class='item' href='#'data-name='passwd'>Cambiar contraseña</a>";
        $menu.="<a class='item' href='#'data-name='edit'>Editar perfil</a>";
        $menu.="<a class='".$this->crear." item' href='#'data-name='crear'>Crear anuncio</a>";
        $menu.="<a class='".$this->mostrar." item' href='#'data-name='anuncio'>Ver anuncio</a>";
        $menu.="</div></div>";
        $menu.="<div class='eleven wide stretched column'>";
        foreach ($this->menuItem as $value) {
            $menu.=$this->$value();
        }
        /*$menu.=$this->info();
        $menu.=$this->passwd();
        $menu.=$this->edit();
        $menu.=$this->crear();
        $menu.=$this->mostrar();*/
        $menu.="</div>";
        $menu.="<script>
            $('.hidden-cont').hide();
            var data=$('.active').attr('data-name');
            $('#'+data).show();
            $('.menu .item').click(function(){
                if(!$(this).hasClass('disabled')){
                $('.hidden-cont').hide();
                $('.menu .item').removeClass('active');
                
                $(this).addClass('active');
                var data_name=$(this).attr('data-name');
                $('#'+data_name).show();
            }
            });</script>";
        

        $this->menu=$menu;
    }
    public function pintAccount(){
        return $this->menu;
    }
    public function bodyMenu(){

    }

}


?>