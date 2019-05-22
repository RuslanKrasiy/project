<?php
class profesional extends usuario{
    private $fecha_nac;
    private $publicados;

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
   
    public function insertProf($link){
        try{
            //LAMAR EL FORMULARIO
            $consult=$link->prepare("CALL insert_prof('$this->email','$this->nombre','$this->apellido','$this->ciudad'
            ,'$this->foto','$this->passwd','$this->fecha_nac','0')");
            $consult->execute();
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }



}
?>