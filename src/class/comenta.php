<?php
class comenta{
    private $email;
    private $id_anuncio;
    private $fecha;
    private $texto;

    /*public function __construct($email,$id_anuncio){
        $this->email=$email;
        $this->id_anuncio=$id_anuncio;
    }*/
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

    public function writeComent($link){
        try{
            $consult=$link->prepare("INSERT INTO comentario(email,id_anuncio,fecha,texto)
            VALUES('$this->email','$this->id_anuncio',now(),'$this->texto')");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en guardar comentario [ ".$error.getMessage()." ]";
            die();
        }
    }

    public function getAllComents($link,$id){
        try{
            $consult=$link->prepare("Select u.nombre, u.apellido,u.foto, c.fecha,c.texto
                From comenta c,usuario u
                where c.email_user=u.email
                and c.id_anuncio='$id'");
            $consult->execute();
            return $consult->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            echo "Error en guardar comentario [ ".$error.getMessage()." ]";
            die();
        }
    }
}

?>