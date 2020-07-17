<?php
class Stock_Model extends CI_Model{

public function __construct(){
    parent::__construct();
}

public function loadstock(){
    $sql = "SELECT * 
    FROM refrigerator,food
    WHERE refrigerator.r_id = food.f_id";
    $result = $this->db->query($sql);
    return $result->result();
    
}



} 
?>