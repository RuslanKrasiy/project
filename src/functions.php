<?php
function drawSelect($row,$name,$id=""){
    $select="<select class='ui dropdown' name='$name'>";
        $select.="<option value=''>Selecione...</option>";
        foreach($row as $value){
            if($id==$value['nombre']) $select.="<option value=".$value['id']." selected>";
            else $select.="<option value=".$value['id'].">";
            $select.=$value['nombre']."</option>";
            
        }
    $select.="</select>";
    return $select;
}

function allAnuncios($link){
    try{
        $consult=$link->prepare("Select A.id,A.fotos,A.titulo,A.subtitulo, V.puntos
        From anuncio A,votar V
        where A.id=V.id_anuncio");
        $consult->execute();
        return $consult->fetch(PDO::FETCH_ASSOC);
    }catch(PDOExeption $error){
        echo "Error en showGAbinet [ ".$error.getMessage()." ]";
        die();
    }
}
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   exit;
}
function random_str($num=30){
    return substr(str_shuffle('0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM'),0,$num);
}


?>