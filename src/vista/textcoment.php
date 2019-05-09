<?php
if($avatar==null) $avatar="<i icon='user icon'></i>";
else $avatar="<img src=".$userFoto.">";
echo"<div class='comment'>";
echo"<a class='avatar'>";
  echo $avatar;
echo"</a>";
echo"<div class='content'>";
  echo"<a class='author'>$username</a>";
  echo"<div class='metadata'>";
    echo"<div class='date'>$fecha</div>";
  echo"</div>";
  echo"<div class='text'>";
    echo"<p>$texto</p>";
  echo"</div>";
  echo"<div class='actions'>";
    echo"<a class='reply'>Comentar</a>";
  echo"</div>";
echo"</div>";



?>