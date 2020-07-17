<?php
class Questionnaire_Model extends CI_Model{

public function __construct(){
    parent::__construct();
}

public function setQuestionnaire($d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14){
    $sql = "INSERT INTO `questionnaire` (`q_number`, `q_gender`, `q_age`, `q_never`, `q_f1`, `q_f2`, `q_f3`, `q_f4`, `q_f5`, `q_ser1`, `q_ser2`, `q_ser3`, `q_se1`, `q_se2`, `q_se3`, `q_time`) VALUES (NULL, '".$d1."', '".$d2."', '".$d3."', '".$d4."', '".$d5."','".$d6."','".$d7."', '".$d8."', '".$d9."', '".$d10."', '".$d11."', '".$d12."', '".$d13."', '".$d14."', CURRENT_TIMESTAMP);";
    $query = $this->db->query($sql);

    $rs = "";
    if($query){
        $rs = 1;      
    }else{
        $rs= 0;
    }
    return $rs;
    
}





} 
?>