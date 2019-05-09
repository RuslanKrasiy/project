<?php

echo"<div class='ui container'>";
echo"<form method='post' class='ui form login' action='/login'>";
echo"<div class='required field'>";
//echo"<label>Nombre</label>";
echo"<div class='two fields'>";
    echo"<div class='field'>";
    echo"<input type='email' name='email' 
    placeholder='Correo electronico' value='$email_inp'></div>";
    echo"<div class='field'>";
        echo"<input type='password' name='password'
        placeholder='Contraseña'></div>";
echo"</div>";
echo"</div>";
//echo"<p>$this->error</p>";
echo"<input type='submit' class='ui blue submit button' name='logIn' value='Entrar'>";
echo"<a class='ui button' href='/?new_user=1'>Crear cuenta</a>";
echo"<a class='ui button' href='/?ctx=recover'>¿Olvidado contraseña?</a>";

echo"<div class='ui error message'></div>";
echo"</form>";
echo"</div>";
echo"<script src='/public/scripts/form_ent.js'></script>";
