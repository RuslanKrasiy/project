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
            echo "Error en insertacion con Base de datos [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function update($link){
        try{
            $consult=$link->prepare("UPDATE anuncio
            set titulo='$this->titulo',
            subtitulo='$this->subtitulo',
            descripcion ='$this->direccion',
            fotos ='$this->fotos',
            categoria='$this->id_cat',
            contacto='$this->contacto' 
            WHERE email_user='$this->email_user'
            and id='$this->id'
            ");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en update [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function delete($link){
        try{
            $consult=$link->prepare("DELETE FROM anuncio 
            WHERE email_user='$this->email_user'
            and id='$this->id'
            ");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en eliminar [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function visitorAnuncio($link,$id){
        try{
            $consult=$link->prepare("SELECT *
            FROM anuncio
            WHERE id='$id'
            ");
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            echo "Error en show [ ".$error.getMessage()." ]";
            die();
        }
    }

    public function verAnuncio($link){
        try{
            $consult=$link->prepare("SELECT Cat.cat_name, An.titulo, An.subtitulo, An.fotos,
            An.descripsion,sum(V.puntos), count(Com.*),
            FROM anuncio An,votar V, categoria Cat, comentarios Com
            WHERE Cat.id = An.id_cat
            and An.id=V.id_anuncio
            and email_user='$this->email_user'");
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            echo "Error en showGAbinet [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function getId($link){
        try{
            $consult=$link->prepare(
                "SELECT MAX(id)+1 AS numId
                FROM anuncio"
            );
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            echo "Error en user insert [ ".$error.getMessage()." ]";
            die();
        }
    }
    /*public function hasAnuncio($link){
        try{
            $consult=$link->prepare("SELECT *
            FROM anuncio
            WHERE id_user='$this->id_user'");
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            echo "Error en hasAnuncio [ ".$error.getMessage()." ]";
            die();
        }
    }*/
}
/*
Select A.fotos,A.titulo,A.subtitulo, V.puntos
From anuncio A,votar V
where A.id=V.id_anuncio
and A.id_user = "13"


 */
?>