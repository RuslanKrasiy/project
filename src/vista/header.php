<?php
function head(){
    $head="<!Doctype html>";
    $head.="<html lang='Es-es'>";
    $head.="<head>";
    $head.="<title>Centro de Estetica</title>";
    $head.="<meta charset='utf-8'>";
    $head.="<link rel='stylesheet' type='text/css' href='semantic/out/semantic.min.css'>";
    $head.="<script src='semantic/jquery-3.4.0.min.js'></script>";
    $head.="<script src='semantic/out/semantic.min.js'></script>";
    $head.="</head>";
    $head.="<body>";

    $head.="<header class='ui fluid container blue inverted segment'>";
    $head.="<div class='ui two column doubling stackable grid container'>";
    $head.="<div class='column'><p>Centro de Estetica</p></div>";
    $head.="<div class='column'>";

    
    $head.="<div class='ui right aligned'>";

    $head.="<p>Segundo</p>";
    $head.="<button type='submit' class='ui button' name='logOut'>Salir</button>";
    $head.="</div>";
    $head.="</div>";
    $head.="</div>";
    $head.="</header>";
    $head.="<section class='ui container'>";
    return $head;
}

?>