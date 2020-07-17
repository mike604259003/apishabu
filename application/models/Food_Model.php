<?php
class Food_Model extends CI_Model{

public function __construct(){
    parent::__construct();
}



public function selectbyName($foodname){
    $sql = "select f_name from food where f_name = '".$foodname."'";
    $result = $this->db->query($sql);

    if($result->result()){
            $status = true;
    }else{
            $status = false;
    }
    
    $rs = [
    'status' => $status,
    'data' => $result->result()
    ];
    return $rs;
}

public function searchcategoryIDByname($categoryname){
    $sql = "select c_id from category where c_name = '".$categoryname."'";
    $result = $this->db->query($sql);

    return $result->result();
}

public function insertfood($foodname,$category){
    $sql ="insert into food (f_cat,f_name,f_img) values ($category,'".$foodname."','food-tray.png')";
    $result = $this->db->query($sql);

    if($result){
        $status = true;
    }else{
        $status = false;
    }
        return $status;
}

public function searchAllMenu(){
    $sql = "select * from food";
    $result = $this->db->query($sql);

    $rs = [
        "data" => $result->result()
    ];
    return $rs;
}

public function insertcategory($categoryname){
    $sql ="insert into category (c_name) values ('".$categoryname."')";
    $result = $this->db->query($sql);

    if($result){
        $status = true;
    }else{
        $status = false;
    }
        return $status;
}

public function updatedatacategory($categoryname,$categoryid){
    $sql = "update category set c_name = '".$categoryname."' where c_id = '".$categoryid."' ";
    $result = $this->db->query($sql);

   
}

public function getAllCategory(){
    $sql = "select * from category";
    $result = $this->db->query($sql);

    $rs = [
    'data' => $result->result()
    ];
    return $rs;
}



public function getFoodByCategoryID($id){
    $sql = "select * from food where f_cat = $id";
    $result = $this->db->query($sql);

    $rs = [
    'data' => $result->result()
    ];
    return $rs;

}

public function checkFood($name){
    $sql = "select * FROM order_list WHERE o_id = '".$order_id."'  and `o_f_id`= '".$food_id."' ";
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $rows = count($query->result());

    $rs = "";
    if($rows > 0){
        $rs= 1;
    }else{
        $rs= 0;
    }
    return $rs;
}

public function getRowfood(){
    $sql = "select count(f_id) as num from food";
    $query = $this->db->query($sql);
    return $query->result();
}

public function getRowcategory(){
    $sql = "select count(c_id) as num from category";
    $query = $this->db->query($sql);
    return $query->result();
}

public function getRowOrder(){
    $sql = "select count(o_id) as num from order_list";
    $query = $this->db->query($sql);
    return $query->result();
}

public function getRowBill(){
    $sql = "select count(b_id) as num from bill";
    $query = $this->db->query($sql);
    return $query->result();
}


} 
?>