<?php
namespace application\models;

use application\core\Model;

class Main extends Model{


    public function userExist($email){
        $result=$this->db->row('SELECT * from clientes where email=$email');
        return $result;
    }
    
}

?> 