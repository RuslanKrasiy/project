<?php
class coment{
    private $id_user;
    private $id_anuncio;
    private $fecha;
    private $texto;

    public function __construct($id_user,$idgab){
        $this->id_user=$id_user;
        $this->id_anuncio=$id_anuncio;
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
    public function writeComent($link){
        try{
            $consult=$link->prepare("INSERT INTO comentarios(id_user,id_anuncio,fecha,texto)
            VALUES('$this->id_user','$this->id_anuncio','now()','$this->texto')");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en guardar comentario [ ".$error.getMessage()." ]";
            die();
        }
    }
}
?>