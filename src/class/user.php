<?php
class user{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $ciudad;
    private $passwd;
    private $foto="user icon";
    private $fecha_nac;

    private $myNotice=TRUE;


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

    public function exist($link){
        try{
            $consult=$link->prepare(
                "SELECT * FROM user where email='$this->email'"
            );
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            echo "Error en exist [ ".$error.getMessage()." ]";
            die();
        }
    }
    /*public function mod($link){
		$consult=$link->prepare("UPDATE user SET nombre='$this->nombre' , direccion='$this->direccion' , email='$this->email', pwd='$this->pwd' WHERE dniCliente='$this->dniCliente'");
		$consult->execute();
	}*/
	public function insert($link){
        try{
            //LAMAR EL FORMULARIO
            $consult=$link->prepare("INSERT INTO user(nombre,apellido,email,passwd,
            fecha_nac,fecha_reg,foto,ciudad,publicacion) 
            VALUES('$this->nombre','$this->apellido','$this->email',
            '$this->passwd','$this->fecha_nac',now(),'$this->foto','$this->ciudad','1')");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en user insert [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function hasAnuncio($link){
        try{
            $consult=$link->prepare(
                "SELECT * FROM A.anuncio, U.user 
                where U.id=A.id_user 
                and U.email = '$this->email'"
            );
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            echo "Error en user insert [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function crearAnuncio($link){
        try{
            
        }catch(PDOExeption $error){
            echo "Error en user insert [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function showinfo($link){
        
    }
    /* 
	public function baja($link){
		$consult=$link->prepare("DELETE FROM user WHERE dniCliente='$this->dniCliente'");
		$consult->execute();
	}
	public function consulta($link){
		$consult=$link->prepare("SELECT * from user WHERE dniCliente='$this->dniCliente'");
		$consult->execute();
		return $consult->fetch(PDO::FETCH_ASSOC);
    }*/
    
}

?>