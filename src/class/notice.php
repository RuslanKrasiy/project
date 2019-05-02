<?php
class notice{
    private $id;
    private $title;
    private $subTitle;
    private $mainFoto;
    private $description;

    private $userWeb;
    private $telMov;
    private $telLoc;
    private $emailNotice;

    private $galery;

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
    public function addNotice($link){
		$consult=$link->prepare(
            "INSERT INTO anuncio VALUES(
                '$this->id','$this->title','$this->subTitle','$this->mainFoto'
                ,'$this->mainFoto','$this->description','$this->userWeb','$telMov',
                '$this->telLoc','$this->emailNotice','$this->galery')
                ");
		$consult->execute();
    }
}
?>