<?php
class puntua{
    private $id_user;
    private $id_anuncio;
    private $puntos;

    public function __construct($id_user,$id_anuncio,$puntos){
        $this->id_user=$id_user;
        $this->idgub=$idgub;
        $this->puntos=$puntos;
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
    
}
?>