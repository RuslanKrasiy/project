<?php
class ciudad{
    private $id;

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
    public function getCiudades($link){
        try{
            $consult=$link->prepare(
                "SELECT * FROM ciudad"
            );
            $consult->execute();
            return $consult->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
    public function mostCiudad($link){
        try{
            $consult=$link->prepare(
                "SELECT * FROM ciudad  WHERE id=$this->id"
            );
            $consult->execute();
            return $consult->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
}
?>