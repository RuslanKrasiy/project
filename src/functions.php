<?php
function drawSelect($row,$name){
    $select="<select class='ui dropdown' name='$name'>";
        $select.="<option value=''>Selecione...</option>";
        foreach($row as $value){
            $select.="<option value=".$value['id'].">";
            if($value['icon']!=null) 
                $select.="<i class='".$value['icon']." icon'></i> ";
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


?>