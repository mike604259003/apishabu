<?php
class Order_Model extends CI_Model{

public function __construct(){
    parent::__construct();
}


public function deletefoodinorder($order_id,$food_id){
    //ค้นหาข้อมูลก่อนจะทำการลบ ว่ามีข้อมูลอยู่ใน db หรือไม่
    $sql = "select * FROM order_list WHERE o_id = '".$order_id."'  and `o_f_id`= '".$food_id."' ";
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $rows = count($query->result());

    $rs = "";
    if($rows > 0){
        try {
            $sql = "delete FROM order_list WHERE o_id = '".$order_id."'  and `o_f_id`= '".$food_id."' ";
            $query = $this->db->query($sql);
            if($query){
                $rs = 1;
            }
         } catch (Exception $e) {
             $rs = 0; //ดักจับ error โดยใช้ try catch
         }
    }else{
        $rs= 0;
    }
    return $rs;
}

public function getOrderfoodbytableStatus1($table_id){
    $sql = "SELECT * FROM order_list  where  o_table = '".$table_id."' and o_status = 'preparing'";
    $result = $this->db->query($sql);

    return $result->result();

}

public function getOrderfoodbytableStatus2($table_id){
    $sql = "select * from order_list, food where order_list.o_f_id = food.f_id AND order_list.o_status = 'finished' and o_table = '".$table_id."' ";
    $result = $this->db->query($sql);

    return $result->result();

}


public function getAllOrder($table){
    $sql = "SELECT * FROM `order_list` WHERE o_table = '".$table."'";
    $result = $this->db->query($sql);

    return $result  ->result();
}


public function getCheckOrder($table_id){
    $sql = "select * from check_order , food where check_order.co_f_id = food.f_id AND check_order.co_table_id = '".$table_id."' ";
    $result = $this->db->query($sql);

    return $result->result();

}

public function getOrderbyID(){
    $sql = "select o_id,o_table,o_time from order_list where `o_status` = 'preparing' order by o_time asc;";
    $result = $this->db->query($sql);

    return $result->result();
}

public function getDetailOrderbyID($order_id){
    $sql = "SELECT * FROM order_detail , food where order_detail.od_f_id = food.f_id and od_id ='".$order_id."'";
    $result = $this->db->query($sql);

    return $result->result();
}

public function setCheckOrder($table_id,$food_id,$amount){
    $sql = "insert into check_order value ('".$table_id."','".$food_id."','".$amount."')";
    $result = $this->db->query($sql);
    $rs="";
    if($result){
        $rs = 1;
    }else{
        $rs=0;
    }
    return $rs;
}

public function getOrderGroup($table_id){
    $sql = "SELECT co_f_id,f_name,sum(co_amount)as total_amount
            from check_order, food
            where co_table_id = '".$table_id."' and check_order.co_f_id = food.f_id
            group by co_f_id
            HAVING sum(co_amount)";
     $result = $this->db->query($sql);

     return $result->result();

}

public function setOrderList($id,$table_id){
    $sql = "INSERT INTO `order_list` (`o_id`, `o_table`, `o_time`, `o_status`) VALUES ('".$id."', '".$table_id."', CURRENT_TIMESTAMP, 'preparing');";
    $result = $this->db->query($sql);
    $rs="";
    if($result){
        $rs = 1;
    }else{
        $rs=0;
    }
    return $rs;
}

public function setOrderDetail($id,$f_id,$amount){
    $sql = "INSERT INTO `order_detail` (`od_id`, `od_f_id`, `od_amount`, `od_status`) VALUES ('".$id."', '".$f_id."', '".$amount."', 'กำลังเตรียม');";
    $result = $this->db->query($sql);
}


public function clearCheckOrder($table_id){
    $sql = "delete from check_order where co_table_id = '".$table_id."'";
    $result = $this->db->query($sql);
}

public function Incrementorder($table,$id,$amount){
    $sql = "UPDATE `check_order` SET `co_amount`= '".$amount."' where `co_f_id` = '".$id."' and `co_table_id` = '".$table."'";
    $result = $this->db->query($sql);
}

public function deletemenu($table,$f_id){
    $sql = "DELETE FROM `check_order` WHERE `co_table_id` = '".$table."' and `co_f_id` = '".$f_id."'";
    $result = $this->db->query($sql);
}

public function confirmorder($id){
    $sql = "UPDATE `order_list` SET `o_status` = 'finished' WHERE `order_list`.`o_id` = '".$id."';";
    $result = $this->db->query($sql);
    $rs="";
    if($result){
        $rs = 1;
    }else{
        $rs=0;
    }
    return $rs;
}


public function getNumberOrder($order_id){
$sql = "select COUNT(od_id) as row_count  from order_detail where od_id = '".$order_id."'";
$sql1 = "select COUNT(od_id) as num_status from order_detail where od_id = '".$order_id."' and od_status = 'เสร็จสิ้น'";
$result = $this->db->query($sql);
$result1 = $this->db->query($sql1);

$data = [
    "all" => $result->result(),
    "have" => $result1->result()
];

return $data;
}

public function changeStatusOrderDetail($order_id,$f_id){
    $sql = "UPDATE `order_detail` SET `od_status` = 'เสร็จสิ้น' WHERE `order_detail`.`od_id` = '".$order_id."' AND `order_detail`.`od_f_id` = '".$f_id."';";
    $result = $this->db->query($sql);

}

public function getDateOrder($time){
    $sql = "select o_id,o_table,o_time from order_list where `o_time` LIKE '%".$time."%'";
    $result = $this->db->query($sql);

    return $result->result();
}

public function checkOrderBeforeCheckBill($table_id){
    $sql = "SELECT * FROM order_list  where  o_table = '".$table_id."' and o_status = 'preparing'";
    $result = $this->db->query($sql);
    $rows = count($result->result());
    $rs = "";
    if($rows > 0){
        $rs = 1;
    }else{
        $rs = 0;
    }
    return $rs;

}



} 
?>