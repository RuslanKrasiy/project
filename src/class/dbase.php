<?php
class dbase{
    private $link;
    
	public function __construct(){
		if(!isset($this->link)){
			try{
				$this->link=new PDO('mysql:host=bd;dbname=proyecto;charset=utf8','proyecto','dbpass');
				//$this->link->exec('set names utf8mb4');
				//$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //$this->link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				
			}catch(PDOExeption $error){
                echo "Cant connect with BD:  ".$error.getMessage();
                echo"<script>console.log('Connection Error')</script>";
				die();
			}
		}
	}
	public function query($sql,$params=[]){
        $stmt=$this->link->prepare($sql);
            if(!empty($params)){
                foreach ($params as $key => $val) {
                    $stmt->bindValue(':'.$key,$val);
                }
            }
        $stmt->execute();
        return $stmt;
    }
	public function row($sql,$params=[]){
        $query=$this->query($sql,$params);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function column($sql,$params=[]){
        $query=$this->query($sql,$params);
        return $query->fetchColumn(PDO::FETCH_ASSOC);
    }
    public function __get($atributo){
		if(property_exists(__CLASS__, $atributo)){
			return $this->$atributo;
		}else 
		return NULL;
	}
	
}

?>