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
public function deletecategory($id){
    $sql = "update category set c_status = 'no' where c_id = '".$id."'";
    $result = $this->db->query($sql);
}

public function deletefood($id){
    $sql = "update food set f_status = 'no' where f_id = '".$id."'";
    $result = $this->db->query($sql);
}

public function searchcategoryIDByname($categoryname){
    $sql = "select c_id from category where c_name = '".$categoryname."'";
    $result = $this->db->query($sql);
    return $result->result();
}
public function insertfood($foodname,$category,$image){
    $sql ="insert into food (f_cat,f_name,f_img) values ($category,'".$foodname."','".$image."')";
    $result = $this->db->query($sql);
    if($result){
        $status = true;
    }else{
        $status = false;
    }
        return $status;
}
public function searchAllMenu(){
    $sql = "SELECT * FROM food , category where food.f_cat = category.c_id and f_status = 'yes'";
    $result = $this->db->query($sql);
    $rs = [
        "data" => $result->result()
    ];
    return $rs;
}
public function insertcategory($categoryname,$image){
    $sql ="insert into category (c_name , c_icons) values ('".$categoryname."','".$image."')";
    $result = $this->db->query($sql);
    if($result){
        $status = true;
    }else{
        $status = false;
    }
        return $status;
}
public function updatedatacategory($categoryname,$categoryid,$image){
    $sql = "update category set c_name = '".$categoryname."' and c_icons = '".$image."' where c_id = '".$categoryid."' ";
    $result = $this->db->query($sql);
    if($result){
        $status = true;
    }else{
        $status = false;
    }
        return $status;

}

public function updatedatafood($foodname,$foodid,$image,$category){
    $sql = "update food set f_name = '".$foodname."' and f_img = '".$image."' and f_cat = '".$category."' where f_id = '".$foodid."' ";
    $result = $this->db->query($sql);
    if($result){
        $status = true;
    }else{
        $status = false;
    }
        return $status;

}

public function getCategoryById($id){
    $sql = "select * from category where c_id = '".$id."'";
    $result = $this->db->query($sql);
    return $result->result();
}

public function getFoodById($id){
    $sql = "SELECT * FROM food , category where food.f_cat = category.c_id and f_id = '".$id."'";
    $result = $this->db->query($sql);
    return $result->result();
}

public function getAllCategory(){
    $sql = "select * from category where c_status = 'yes'";
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
    $sql = "select count(f_id) as num from food where f_status = 'yes'";
    $query = $this->db->query($sql);
    return $query->result();
}
public function getRowcategory(){
    $sql = "select count(c_id) as num from category where c_status = 'yes' ";
    $query = $this->db->query($sql);
    return $query->result();
}
public function getRowOrder(){
    $date = date("Y-m-d");
    $sql = "select count(o_id) as num from order_list where o_time LIKE '%$date%'";
    $query = $this->db->query($sql);
    return $query->result();
}
public function getRowBill(){
    $date = date("Y-m-d");
    $sql = "select count(b_id) as num from bill where b_date LIKE '%$date%'";
    $query = $this->db->query($sql);
    return $query->result();
}

} 
?>