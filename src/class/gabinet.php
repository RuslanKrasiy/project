<?php
class gabinet{
    private $iduser;
    private $titulo;
    private $subtitulo;
    private $ciudad;
    private $descripcion;
    private $foto;
    private $telefono;
    private $direccion="";
    private $user_web="";
    private $categoria;
  


    public function __construct($iduser){
        $this->iduser=$iduser;
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
    public function insert($link){
        try{
        $consult=$link->prepare("INSERT INTO gabinet(iduser,fecha,titulo,subtitulo,
        categoria,ciudad,,direccion,descripcion,
        foto,telefono,user_web) 
        VALUES(
            '$this->iduser','now()','$this->titulo','$this->subtitulo',
            '$this->categoria','$this->ciudad','$this->direccion',
            '$this->descripcion','$this->foto','$this->telefono','$this->user_web')");
        $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en insertacion con Base de datos [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function update($link){
        try{
            $consult=$link->prepare("UPDATE gabinet
            set titulo='$this->titulo',
            subtitulo='$this->subtitulo',
            ciudad ='$this->ciudad' ,
            descripcion ='$this->direccion',
            foto ='$this->foto',
            telefono ='$this->telefono',
            direccion='$this->direccion',
            user_web = '$this->user_web',
            categoria='$this->categoria' 
            WHERE iduser='$this->iduser'");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en update [ ".$error.getMessage()." ]";
            die();
        }
    }
    public function delete($link){
        try{
            $consult=$link->prepare("DELETE FROM gabinet 
            WHERE iduser='$this->iduser'");
            $consult->execute();
        }catch(PDOExeption $error){
            echo "Error en eliminar [ ".$error.getMessage()." ]";
            die();
        }
    }
    
}

?>