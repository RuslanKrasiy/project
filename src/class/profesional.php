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
            echo "Error en user insert [ ".$error.getMessage()." ]";
            die();
        }
    }

    public function misAnuncios($link){
        try{
            $consult=$link->prepare("SELECT A.id, A.fotos, A.titulo,A.subtitulo,
            ROUND(A.puntos/A.votados,1) as puntos,A.votados
            From anuncio A
            where A.email_user= '$this->email'
            '");
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            echo "Error en showGAbinet [ ".$error.getMessage()." ]";
            die();
        }
    }

}
?>