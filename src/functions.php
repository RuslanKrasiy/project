<?php
/**
 * PINTA SELECT DE CIUDADES Y CATEGORIAS
 */
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
/**
 * ASIGNA A LA VARIABLE GLOBAL VALOR DE ERROR
 */
function systemError($error){
    global $msg;
    $msg="Se ha producidoun error. Error ".$error;
}
/**
 * REDIRECIONA 
 */
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   exit;
}
/**
 * CREAR UNA CADENA DE CARACTERES.
 * POR DEFECTO TIENE 30 CARACTERES.
 */
function random_str($num=30){
    return substr(str_shuffle('0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM'),0,$num);
}


?>