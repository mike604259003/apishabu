<?php
class Food extends CI_Controller{
    public function __construct(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:GET, POST ,OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        parent::__construct();
        $this->load->model('Food_Model','food');

    }

    

    public function getFoodByCategoryID(){
        $requestData = json_decode(file_get_contents('php://input'),true);
        if(isset($requestData['id'])){
            $id = $requestData['id'];
            $result = $this->food->getFoodByCategoryID($id);
            echo json_encode($result);
        }else{
            echo 0;
        }
    }
    public function searchAllMenu(){
        $result = $this->food->searchAllMenu();
        echo json_encode($result);
    }
    


    public function addfood(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['foodname']) && $requestData['categoryname']){
        $foodname = $requestData['foodname'];
        $categoryname = $requestData['categoryname'];
        $image = $requestData['image'];
        $category = $this->food->searchcategoryIDByname($categoryname);
        foreach ($category as $row)
        {
        $cat_id =  $row->c_id;
        }
        $result = $this->food->insertfood($foodname,$cat_id,$image);
        echo json_encode($result);
       }else{
        echo 0;
       }
    }
    public function addcategory(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['categoryname'])){
        $categoryname = $requestData['categoryname'];
        $image = $requestData['image'];
        $result = $this->food->insertcategory($categoryname,$image);
        echo json_encode($result);
        }else{
        }
    }
    public function updatecategory(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        $categoryname = $requestData['categoryname'];
        $category_id = $requestData['c_id'];
        $image = $requestData['image'];
        $this->food->updatedatacategory($categoryname,$category_id,$image);
    }

    public function updatefood(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        $foodname = $requestData['foodname'];
        $foodid = $requestData['f_id'];
        $image = $requestData['image'];
        $category = $requestData['category'];
        $this->food->updatedatafood($categoryname,$foodid,$image,$category);
    }

    public function getAllCategory(){
        $result = $this->food->getAllCategory();
        echo json_encode($result);
    }
    public function getRowfood(){
        $rs = $this->food->getRowfood();
        echo json_encode($rs);
    }

    public function getRowcategory(){
        $rs = $this->food->getRowcategory();
        echo json_encode($rs);
    }
    public function getRowOrder(){
        $rs = $this->food->getRowOrder();
        echo json_encode($rs);
    }

    public function getRowBill(){
        $rs = $this->food->getRowBill();
        echo json_encode($rs);
    }

    public function getCategoryById(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        $rs = $this->food->getCategoryById($requestData['c_id']);
        echo json_encode($rs);
    }

    public function getFoodById(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        $rs = $this->food->getFoodById($requestData['f_id']);
        echo json_encode($rs);
    }

    public function deletecategory(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        $rs = $this->food->deletecategory($requestData['c_id']);
        echo json_encode($rs);
    }

    public function deletefood(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        $rs = $this->food->deletefood($requestData['f_id']);
        echo json_encode($rs);
    }


	

    
}
?>