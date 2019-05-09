<?php
echo"<div class='ui container'>";
echo"<form method='post' class='ui form signup' action='/register'>";
echo"<h4 class='ui dividing header'>Crea una cuenta</h4>";
echo"<div class='required field'>";
//echo"<label>Nombre</label>";
    echo"<div class='two fields'>";
        echo"<div class='field'>";
            echo"<input type='text' name='first-name' 
                placeholder='Nombre' value=''></div>";
        echo"<div class='field'>";
            echo"<input type='text' name='last-name' 
                placeholder='Apellido'></div>";
    echo"</div>";
echo"</div>";   
echo"<div class='required field'>";
    echo"<div class='fields'>";
        echo"<div class='twelve wide field'>";
            echo"<input type='email' name='email' 
                placeholder='Correo electronico' value=''></div>";
    echo'</div>';
    echo"<div class='required field'>";
        echo"<div class='six wide field'>";
        echo"<input type='password' name='password'
        placeholder='Contraseña' value=''></div>";
    echo"</div>";

    echo"<div class='three fields'>";
        echo"<label>Fecha de nacimiento</label>";
        echo"<div class='two wide required field'>";
            echo"<select class='ui search dropdown' name='day'>";
            echo"<option value=''>Dia</option>";
                for($i=1;$i<32;$i++){
                    echo"<option value='$i'>$i</option>";
                }
                
            echo"</select>";
        echo"</div>";

        echo"<div class='two wide required field'>";
            echo"<select class='ui search dropdown'  name='month'>";
                echo"<option value=''>Mes</option>";
                echo"<option value='1'>Enero</option>";
                echo"<option value='2'>Febrero</option>";
                echo"<option value='3'>Marzo</option>";
                echo"<option value='4'>Abril</option>";
                echo"<option value='5'>Mayo</option>";
                echo"<option value='6'>Junio</option>";
                echo"<option value='7'>Julio</option>";
                echo"<option value='8'>Agosto</option>";
                echo"<option value='9'>Septiembre</option>";
                echo"<option value='10'>Octubre</option>";
                echo"<option value='11'>Noviembre</option>";
                echo"<option value='12'>Deciembre</option>";
            echo"</select>";
        echo"</div>";

    echo"<div class='two wide required field'>";
            echo"<select class='ui search dropdown' name='year'>";
                echo"<option value=''>Año</option>";
                for($i=2010;$i>1955;$i--){
                    echo"<option value='$i'>$i</option>";
                }
                
            echo"</select>";
        echo"</div>";
    
    echo"</div>";

    echo"<div class='inline field'>";
            echo"<label>Al hacer clic en Registrar , aceptas nuestras <a href='#'>Condiciones</a>
            . Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la 
            <a href='politica_datos.php'>Política de datos</a>, así como el uso que hacemos de la cookies y tecnologías similares
            en nuestra <a href='politica_cookies.php'>Política de cookies</a>.</label>";
        echo"</div>";
    echo"</div>";
    echo"<input type='submit' class='ui blue submit button' name='signup' value='Registrarse'>";
    echo"<a class='ui button' href='/'>Cancelar</a>";
    echo"<div class='ui error message'></div>";
echo"</form>";
echo"</div>";
echo"<script src='/public/scripts/form_reg.js'></script>";
