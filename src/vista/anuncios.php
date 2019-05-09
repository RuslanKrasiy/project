<?php
echo"<div class='ui card'>";
echo"<div class='image'>";
  echo"<img src=".$fotos[0].">";
echo"</div>";
echo"<div class='content'>";
  echo"<div class='header'>$titulo</div>";
  echo"<div class='description'>";
    $subtitulo
  echo"</div>";
echo"</div>";
echo"<div class='ui two bottom attached buttons'>";
  echo"<div class='ui button'>";
    echo"<i class='add icon'></i>Queue";
    
  echo"</div>";
  echo"<div class='ui primary button'>";
    echo"<i class='play icon'></i>Watch";
    
  echo"</div>";
echo"</div>";
echo"</div>";
echo"<div class='ui popup'>";
echo"<div class='header'>Puntuación de usuario</div>";
echo"<div class='ui star rating' data-rating=".$puntos."></div>";
echo"</div>";

?>