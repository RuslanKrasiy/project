<?php
class votar{
    private $iduser;
    private $idgab;
    private $puntos;

    public function __construct($iduser,$idgab,$puntos){
        $this->iduser=$iduser;
        $this->idgub=$idgub;
        $this->puntos=$puntos;
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
    public function votacion($link){
        try{
            $consult=$link->prepare("INSERT INTO gabinet(iduser,idgub,puntos)
            VALUES('$this->iduser','$this->idgub',
            '$this->puntos')");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en votacion [ ".$error.getMessage()." ]";
            die();
        }
    }
}
?>