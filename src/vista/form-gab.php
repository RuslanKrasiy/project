<?php
echo"<form class='ui form' action='' method='post'>";
echo"<div class='field'>";
    echo"<label>Titulo</label>";
    echo"<input type='text' name='titulo' placeholder='Ej: myCabinete '>";
echo"</div>";
echo"<div class='field'>";
    echo"<label>Categoria</label>";
    echo"<select name='ciudades'>";
        echo"<option value='1'>Cat 1</option>";
        echo"<option value='2'>Cat 2</option>";
        echo"<option value='3'>Cat 3</option>";
    echo"</select>";
echo"</div>";
echo"<div class='field'>";
    echo"<label>Subtitulo</label>";
    echo"<input type='text' name='subtitulo' placeholder='Ej: texto'>";
echo"</div>";

echo"<div class='field'>";
    echo"<label>Ciudades</label>";
    echo"<select name='ciudades'>";
        echo"<option value='01'>Ciudad 1</option>";
        echo"<option value='02'>Ciudad 2</option>";
        echo"<option value='03'>Ciudad 3</option>";
    echo"</select>";
echo"</div>";
echo"<div class='field'>";
    echo"<label>Direccion (opcional)</label>";
    echo"<input type='text' name='direccion' placeholder='calle:'>";
echo"</div>";
echo"<div class='field'>";
    echo"<label>Descripcion</label>";
    echo"<input type='textarea' name='descripcion' placeholder='Ej: descripcion'>";
echo"</div>";

echo"<div class='field'>";
    echo"<label>Tu sitio web (opcional)</label>";
    echo"<input type='text' name='user_web' placeholder='www.mycabinete.com'>";
echo"</div>";


echo"<div class='field'>";
    echo"<label>fotos</label>";
    echo"<input type='file' name='fotos' placeholder='sube la imagen'>";
echo"</div>";

echo"<button class='ui button' type='submit' name='newGab'>Submit</button>";
echo"</form>";
?>