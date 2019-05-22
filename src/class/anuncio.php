<?php
class anuncio{
    private $id;
    private $email_user;
    private $id_cat;
    private $titulo;
    private $subtitulo;
    private $descripcion;
    private $fotos;
    private $contacto;

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
    public function insert($link){
        try{
            $consult=$link->prepare("INSERT INTO anuncio  
        VALUES('$this->id',
            '$this->email_user',
            '$this->id_cat',
            '$this->titulo',
            '$this->subtitulo',
            '$this->descripcion',
            '$this->contacto',
            '$this->fotos',
            now(),'0','0')");
        $consult->execute();
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
/**
 * DETALLES DE ANUNCIO
 */
    public function visitorAnuncio($link,$id){
        try{
            $consult=$link->prepare("SELECT *
            FROM anuncio
            WHERE id='$id'
            ");
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
/**
 * DEVUELVE ULTIMO ID QUE SE ENCUENTRE EN BASE DE DATOS.
 * NECESITO HACER ASI, PORQUE EN TIEMPO DE CREAR ANUNCIO
 * NECESITO CREAR LA CARPETA PARA GUARDAR FOTO DE DICHO 
 * ANUNCIO. 
 */
    public function getId($link){
        try{
            $consult=$link->prepare(
                "SELECT MAX(id)+1 AS numId
                FROM anuncio"
            );
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
}

?>