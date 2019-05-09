<?php
class coment{
    private $iduser;
    private $idgub;
    private $fecha;
    private $texto;

    public function __construct($iduser,$idgab){
        $this->iduser=$iduser;
        $this->idgub=$idgub;
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
            $consult=$link->prepare("INSERT INTO comentarios(iduser,idgub,fecha,texto)
            VALUES('$this->iduser','$this->idgub','now()','$this->texto')");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en guardar comentario [ ".$error.getMessage()." ]";
            die();
        }
    }
}
?>