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
        $category = $this->food->searchcategoryIDByname($categoryname);
       
        foreach ($category as $row)
        {
        $cat_id =  $row->c_id;
       
        }
         
        $result = $this->food->insertfood($foodname,$cat_id);
        echo json_encode($result);
       }else{
        echo 0;
       }
    }

    public function addcategory(){
        
        $requestData = json_decode(file_get_contents('php://input'), true);

        if(isset($requestData['categoryname'])){
        $categoryname = $requestData['categoryname'];

        $result = $this->food->insertcategory($categoryname);
        echo json_encode($result);
        }else{

        }
    }

    public function updatecategory(){
       
        $categoryname = "ไอศกรีม";
        $category_id = 9;
        $this->food->updatedatacategory($categoryname,$category_id);
    }

    public function getAllCategory(){
        $result = $this->food->getAllCategory();
        echo json_encode($result);
    }
	
    

}
?>