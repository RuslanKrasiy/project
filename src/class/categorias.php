<?php
class categorias{
    private $nombre;

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
    public function getCategorias($link){
        try{
            $consult=$link->prepare(
                "SELECT * FROM categoria"
            );
            $consult->execute();
            return $consult->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            echo "Error en exist [ ".$error.getMessage()." ]";
            die();
        }
    }
}
?>