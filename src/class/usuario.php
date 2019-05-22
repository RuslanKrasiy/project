<?php
class usuario{
    protected $email;
    protected $nombre;
    protected $apellido;
    
    protected $ciudad;
    protected $passwd;
    protected $foto="user icon";

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
                "SELECT u.email,u.nombre,u.apellido,u.foto,u.passwd,c.nombre as ciudad, c.id FROM usuario u,ciudad c
                where u.ciudad=c.id
                and u.email='$this->email'"
            );
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
    /**
     * FUNCION QUE DEVUELVE QUE TIPO 
     * DE USURIO SE HA AUTIRIZADO.
     * CLIENTE O PROFESILONAL
     */
    public function whoIs($link){
        try{
            $consult=$link->prepare(
                "SELECT * FROM profesional where email='$this->email'"
            );
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
    public function updateUsuario($link){
		try{
            $consult=$link->prepare("UPDATE usuario SET nombre='$this->nombre' , 
            apellido='$this->apellido',
            ciudad='$this->ciudad',
            foto='$this->foto'
            WHERE email='$this->email'");
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
    public function cambiarPwd($link){
        try{
            $consult=$link->prepare(
            "UPDATE usuario SET passwd='$this->passwd'
            WHERE email='$this->email'");
            $consult->execute();
            return $consult->fetch(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
    public function puntua($link,$id,$puntos){
        try{
            $consult=$link->prepare(
            "INSERT INTO puntua VALUES
            ('$this->email','$id','$puntos')");
            $consult->execute();
                
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
    public function comenta($link,$id,$texto){
        try{
            $consult=$link->prepare("INSERT INTO comenta
            VALUES('$this->email','$id',now(),'$texto')");
            $consult->execute();
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
    public function misAnuncios($link){
        try{
            $consult=$link->prepare("SELECT A.id, A.fotos, A.titulo,A.subtitulo,
            ROUND(A.puntos/A.votados,1) as puntos,A.votados
            From anuncio A
            where A.email_user= '$this->email'
            ");
            $consult->execute();
            return $consult->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOExeption $error){
            systemError($error.getMessage());
            die();
        }
    }
        
}

?>