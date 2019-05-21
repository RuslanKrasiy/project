<?php
class cliente extends usuario{
    private $fecha_reg;

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

    public function insertCLiente($link){
        try{
            //LAMAR EL FORMULARIO
            $consult=$link->prepare("CALL insert_cliente 
            ('$this->email','$this->nombre','$this->apellido','$this->ciudad'
            ,'$this->foto','$this->passwd',now())");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en user insert [ ".$error.getMessage()." ]";
            die();
        }
    }

}
?>