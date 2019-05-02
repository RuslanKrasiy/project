<?php
class dbase{
    private $link;
    
	public function __construct(){
		if(!isset($this->link)){
			try{
				$this->link=new PDO('mysql:host=bd;dbname=proyecto;charset=utf8','proyecto','dbpass');
				//$this->link->exec('set names utf8mb4');
				
				
			}catch(PDOExeption $error){
                echo "Cant connect with BD:  ".$error.getMessage();
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