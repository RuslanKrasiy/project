<?php
class dbase{
    private $link;
    
	public function __construct(){
		if(!isset($this->link)){
			try{
				$this->link=new PDO('mysql:host=bd;dbname=proyecto','proyecto','dbpass');
                $this->link->exec('set names utf8mb4');
                echo"<script>console.log('conection is good')</script>";
			}catch(PDOExeption $error){
                print "Cant connect with BD:  ".$error.getMessage();
                echo"<script>console.log('Connection Error')</script>";
				die();
			}
		}
	}
	public function __get($atributo){
		if(property_exists(__CLASS__, $atributo)){
			return $this->$atributo;
		}else 
		return NULL;
	}
}

?>