<?php
function registrar(){
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
        $form.="<div class='ui error message'></div>";
    $form.="</form>";
    $form.="</div>";
    return $form;
}
function entrada(){
    $form="<div class='ui container'>";
    $form.="<form method='post' class='ui form login' action=''>";
    $form.="<h4 class='ui dividing header'>Crea una cuenta</h4>";
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
    $form.="<input type='submit' class='ui blue submit button' name='logIn' value='Entrar'>";
    $form.="<div class='ui error message'></div>";
    $form.="</form>";
    $form.="</div>";
    return $form;
}
?>