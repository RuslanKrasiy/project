<?php
echo "<!Doctype html>";
echo "<html lang='Es-es'>";
echo "<head>";
echo "<title>$title</title>";
echo "<meta charset='utf-8'>";
echo "<link rel='icon' type='image/png' href='/public/images/g54501.png'>";
echo "<link rel='stylesheet' type='text/css' href='/public/semantic/out/semantic.min.css'>";
echo "<script src='/public/scripts/jquery-3.1.1.min.js'></script>";
echo "<script src='/public/semantic/out/semantic.min.js'></script>";
echo "<link rel='stylesheet' type='text/css' href='/public/style/main.css'>";
echo "</head>";
echo "<body>";


echo "<header class='ui fluid container blue inverted segment'>";
echo "<div class='ui two column doubling stackable grid container'>";
echo "<div class='column'><img src='/public/images/g511.png'></div>";
echo "<div class='column'>";


echo "<div class='ui right aligned'>";

echo "<a href='/login' class='ui button white inverted'>Entrar</a>";
//echo "<button type='submit' class='ui button' name='logOut'>Salir</button>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</header>";
echo "<section class='ui container'>";

echo $content;


echo "</section><footer class='ui fluid raised very padded container inverted segment'style='margin-bottom:0;'>";
echo "<div class='ui three column doubling stackable grid container'>";
echo "<div class='column'>";
echo "<h4>Informacion</h4>";
echo "<div class='ui padded text inverted segment'>";
echo "<p><a href='#'>Nuestro equipo</a></p>";
echo "<p><a href='#'>Política de datos</a></p>";
echo "<p><a href='#'>Política de cookies</a></p>";
echo "</div>";
echo "</div>";
echo "<div class='column'>";
echo "<h4>Cantacto</h4>";
echo "<div class='ui padded text inverted segment'>";
echo "<p><a href='#'>soporte@gmail.com</a></p>";
echo "<p>av.Blasco Ibañes 128, 1</p>";
echo "<p>Valencia, 46014</p>";
echo "</div>";
echo "</div>";
echo "<div class='column'>";
echo "<h4>Columnas</h4>";
echo "<div class='ui padded text inverted segment'>";
echo "<p>Columnas</p>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "<div class='ui divider'></div>";
echo "<div class='ui fluid center aligned container'>";
echo "<p>Diseñado por : <a href='#' class=''>Ruslan Krasiy</a></p>";
echo "</div>";
echo "</footer>";

echo "<script src='/public/scripts/form.js'></script>";
echo"</body>";
echo "</html>";

?>