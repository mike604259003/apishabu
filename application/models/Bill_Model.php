<?php
class Bill_Model extends CI_Model{

public function __construct(){
    parent::__construct();
    $this->load->helper('date');
}

public function openBill($table,$amount){
   
    $microtime = microtime();
    $time = ( preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime) );   
    $data = array(
        'b_id' => $time,
        'b_amount_people' => $amount,
        'b_price' => 199,
        'b_table' => $table,
        'b_status' => 'ดำเนินการ'
    ); 
    
    $this->db->insert('bill',$data);
    $sql = "select b_id from bill where b_date = (select max(b_date) from bill) and b_table = '".$table."'";
    $result = $this->db->query($sql);

    $sql1 = "UPDATE `tableland` SET `t_status` = 'unready' WHERE `tableland`.`t_id` = '".$table."';";
    $this->db->query($sql1);
    return $result->result();
}

public function updatepeople($bill,$amount){
    $sql = "UPDATE `bill` SET `b_amount_people` = '".$amount."' WHERE `bill`.`b_id` = '".$bill."';";
    $result = $this->db->query($sql);
}

public function getAllBill(){
    $sql = "SELECT * FROM `bill` ";
    $result = $this->db->query($sql);

    return $result->result();
}

public function getBillByID($bill_id){
    $sql = "select * from bill where b_id = '".$bill_id."'";
   
    $result = $this->db->query($sql);

    return $result->result();
}

public function checkStatusBill($bill_id){
    $sql = "SELECT b_status FROM bill WHERE b_id = '".$bill_id."';";
    $result = $this->db->query($sql);

    return $result->result();
}
public function changeStatusBill1($bill_id){
    $sql = "UPDATE `bill` SET `b_status` = 'เรียกชำระเงิน' WHERE `bill`.`b_id` = '".$bill_id."';";
    $query = $this->db->query($sql);
    $rows = $this->db->affected_rows($query);

    $rs = "";
    if($rows > 0){
        try {
             $rs = 1;  
         } catch (Exception $e) {
             $rs = 0; //ดักจับ error โดยใช้ try catch
         }
    }else{
        $rs= 0;
    }
    return $rows;
}

public function changeStatusBill2($bill_id){
    $sql = "UPDATE `bill` SET `b_status` = 'เก็บเงินแล้ว' WHERE `bill`.`b_id` = '".$bill_id."';";
    $query = $this->db->query($sql);
    $rows = $this->db->affected_rows($query);

    $rs = "";
    if($rows > 0){
        try {
             $rs = 1;  
         } catch (Exception $e) {
             $rs = 0; //ดักจับ error โดยใช้ try catch
         }
    }else{
        $rs= 0;
    }
    $sql1 = "UPDATE `tableland` SET `t_status` = 'ready' WHERE `tableland`.`t_id` = '".$table."';";
    $this->db->query($sql1);
    return $rows;
}

public function getBillStatusMakepayment(){
    $sql = "SELECT * FROM bill WHERE b_status = 'เรียกชำระเงิน';";
    $result = $this->db->query($sql);

    return $result->result();
}

public function getBillStatusMakepaymentDate($date){
    $sql = "SELECT * FROM bill  where `b_date` LIKE '%".$date."%'";
    $result = $this->db->query($sql);

    return $result->result();
}

public function changeStatusQuestion($bill){
    $sql = "UPDATE `bill` SET `b_qa` = 'yes' WHERE `bill`.`b_id` = '".$bill."';";
    $result = $this->db->query($sql);
    $rs = "";
    if($result){
        $rs = 1;
    }else{
        $rs = 0;
    }

    return $rs;
}




} 
?>