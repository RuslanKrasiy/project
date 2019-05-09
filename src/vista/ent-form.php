<?php
echo"<div class='ui middle aligned center aligned grid'>";
echo"<div class='column'>";
  echo"<h2 class='ui teal image header'>";
    //echo"<img src='assets/images/logo.png' class='image'>";
    echo"<div class='content'>Conexión a su cuenta";
      
    echo"</div>";
  echo"</h2>";
  echo"<form class='ui large form'>";
    echo"<div class='ui stacked segment'>";
      echo"<div class='field'>";
        echo"<div class='ui left icon input'>";
          echo"<i class='user icon'></i>";
          echo"<input type='text' name='email' placeholder='E-mail address'>";
        echo"</div>";
      echo"</div>";
      echo"<div class='field'>";
        echo"<div class='ui left icon input'>";
          echo"<i class='lock icon'></i>";
          echo"<input type='password' name='password' placeholder='Password'>";
        echo"</div>";
      echo"</div>";
      echo"<div class='ui fluid large teal submit button'>Login</div>";
    echo"</div>";

    echo"<div class='ui error message'></div>";

  echo"</form>";

  echo"<div class='ui message'>";
    echo"¿Recuperar contraseña? <a href='#'>Crear cuenta</a>";
  echo"</div>";
echo"</div>";
echo"</div>";
echo"<script src='/public/scripts/form_ent.js'></script>";

?>