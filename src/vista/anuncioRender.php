<?php
class anuncioRender{
    private $puntos;
    private $id;
    private $fotos;
    private $titulo;
    private $subtitulo;
    private $votados;
    
    public function __construct(){

    }

    public function __get($attr){
        if(property_exists(__CLASS__, $attr)){
            return $this->$attr;
        }else{
            return NULL;
        }
    }
    
    public function __set($attr,$value){
        if(property_exists(__CLASS__, $attr)){
            return $this->$attr=$value;
        }else{
            return NULL;
        }
    }
    public function mostrar(){
        $card="<div class='ui special cards'>";
        $card.="<div class='card'>";
        $card.="<div class='content'>";
        $card.="<div class='right floated meta'>";
        $card.="<i class='heart outline like icon'></i> Puntuación media $this->puntos</div>";
        $card.="</div>";
        $card.="<div class='blurring dimmable image'>";
        $card.="<div class='ui dimmer'>";
        $card.="<div class='content'>";
        $card.="<div class='center'>";
        $card.="<a class='ui inverted button' href='/?detalles=$this->id'>Detalles</a>";
        $card.="</div>";
        $card.="</div>";
        $card.="</div>";
        $card.="<img src='$this->fotos' style='object-fit: cover;height: 400px;width:100%;'>";
        $card.="</div>";
        $card.="<div class='content'>";
        $card.="<a class='header'>$this->titulo</a>";
        $card.="<div class='meta'>";
        $card.="<span class='date'>$this->subtitulo</span>";
        $card.="</div>";
        $card.="</div>";
        $card.="<div class='extra content'>";
        $card.="<div class='ui heart rating' data-id='$this->id' data-rating='3'></div>";
        $card.="<div class='item right floated'>";
        $card.="<i class='users icon'></i>$this->votados</div>";
        $card.="</div>";
        $card.="</div>";
        $card.="</div>";        
        return $card;
    }
}
?>