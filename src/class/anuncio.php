<?php
class anuncio{
    //private $id;
    private $id_user;
    private $id_cat;
    private $titulo;
    private $subtitulo;
    private $descripcion;
    private $fotos;

    public function __construct($iduser){
        $this->id_user=$iduser;
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
            $consult=$link->prepare("INSERT INTO anuncio (id_user,id_cat,fecha,titulo,subtitulo,
        descripcion,fotos) 
        VALUES(
            '$this->id_user','$this->id_cat',now(),'$this->titulo','$this->subtitulo',
            '$this->descripcion','$this->fotos')");
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
            categoria='$this->id_cat' 
            WHERE id_user='$this->id_user'");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en update [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function delete($link){
        try{
            $consult=$link->prepare("DELETE FROM anuncio 
            WHERE id_user='$this->id_user'");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en eliminar [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function showAnuncio($link){
        try{
            $consult=$link->prepare("SELECT *
            FROM anuncio
            WHERE id_user='$this->id_user'");
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            echo "Error en show [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function showGabinet($link){
        try{
            $consult=$link->prepare("SELECT Cat.cat_name, An.titulo, An.subtitulo, An.fotos,
            An.descripsion,sum(V.puntos), count(Com.*),
            FROM anuncio An,votar V, categoria Cat, comentarios Com
            WHERE Cat.id = An.id_cat
            and An.id=V.id_anuncio
            and id_user='$this->id_user'");
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            echo "Error en showGAbinet [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function hasAnuncio($link){
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
    }
}
/*
Select A.fotos,A.titulo,A.subtitulo, V.puntos
From anuncio A,votar V
where A.id=V.id_anuncio
and A.id_user = "13"


 */
?>