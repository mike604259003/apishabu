<?php
class Order extends CI_Controller{

    public function __construct(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:GET, POST ,OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        parent::__construct();
        $this->load->model('Order_Model','order');
		
        
    }
    

    public function getCheckOrder (){
        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['table_id'])){
        $result = $this->order->getCheckOrder($requestData['table_id']);
        echo json_encode($result);
        }else{
            echo 0;
        }
    }

    public function getOrderfoodbytableStatus1(){

        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['table_id'])){
            $result = $this->order->getOrderfoodbytableStatus1($requestData['table_id']);
            echo json_encode($result);
        }else{
            echo 0;
        }

    }

    public function deletefoodinorder (){
        $o_id=$_GET['order'];
        $f_id=$_GET['food'];
        $result = $this->order->deletefoodinorder($o_id,$f_id);
        echo json_encode($result);
    }

    public function getOrderfoodbytableStatus2(){

        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['table_id'])){
            $result = $this->order->getOrderfoodbytableStatus2($requestData['table_id']);
            echo json_encode($result);
        }else{
            echo 0;
        }

    }


    public function getdeletecheckorder(){

        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['co_table_id'])){
            $result = $this->order->getCheckOrder($requestData['co_f_id'],$requestData['co_table_id']);
            echo json_encode($result);
        }else{
            echo 0;
        }

    }
}
?>