<?php
class User_Model extends CI_Model{

public function __construct(){
    parent::__construct();
}

public function searchuserlogin($user,$pass){
    $sql = "select * from personnel where p_username = '".$user."' and p_pass = '".$pass."'";
    $result = $this->db->query($sql);

    if($result->result()){
            $status = true;
    }else{
            $status = false;
    }
    
    $rs = [
    'status' => $status,
    'data' => $result->result(),
    ];
    return $rs;
    
}

public function register($name,$position,$user,$pass){
        $sql = "select * FROM personnel WHERE p_username = '".$user."'  and `p_name`= '".$name."' ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $rows = count($query->result());
    
        $rs = "";
        if($rows == 0){
         
        $sql = "INSERT INTO `personnel`( `p_name`, `p_position`, `p_username`, `p_pass`, `p_picture`) VALUES ('".$name."','".$position."','".$user."','".$pass."','avatar-1.png')";
        $query = $this->db->query($sql);
        if($query){
                $rs = 1;
        }
               
        }else{
                $rs= 0;
        }
        return $rs;
}



} 
?>