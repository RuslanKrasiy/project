<?php
class client{
    private $name;
    private $lastName;
    private $email;
    private $pass;

    private $secondLastName=NULL;
    private $city=NULL;
    private $town=NULL;
    private $foto=NULL;
    private $birthDate=NULL;

    private $myNotice=TRUE;


    public function __construct(/*$name,$lastName,$email,$pass,$birthDate*/){
       /* $this->name=$name;
        $this->lastName=$lastName;
        $this->email=$email;
        $this->pass=$pass;
        $this->birthDate=$birthDate;*/
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
        $consult=$link->prepare(
            "SELECT * FROM clientes where email='$this->email'"
        );
        $consult->execute();
        return $consult->fetch(PDO::FETCH_ASSOC);
    }
    /*public function mod($link){
		$consult=$link->prepare("UPDATE clientes SET nombre='$this->nombre' , direccion='$this->direccion' , email='$this->email', pwd='$this->pwd' WHERE dniCliente='$this->dniCliente'");
		$consult->execute();
	}*/
	public function signUp($link){
		$consult=$link->prepare("INSERT INTO clientes(nombre,apellido,email,passwd,fecha_nacim) VALUES('$this->name','$this->lastName','$this->email','$this->pass','$this->birthDate')");
		$consult->execute();
    }
    /* 
	public function baja($link){
		$consult=$link->prepare("DELETE FROM clientes WHERE dniCliente='$this->dniCliente'");
		$consult->execute();
	}
	public function consulta($link){
		$consult=$link->prepare("SELECT * from clientes WHERE dniCliente='$this->dniCliente'");
		$consult->execute();
		return $consult->fetch(PDO::FETCH_ASSOC);
    }*/
    
}

?>