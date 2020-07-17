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

    public function getAllOrder(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['table_id'])){
        $result = $this->order->getAllOrder($requestData['table_id']);
        echo json_encode($result);
        }
    }

    public function getOrderbyID(){
        $result = $this->order->getOrderbyID();
        echo json_encode($result);
    }

    public function getDetailOrderbyID(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        $order_id = $requestData['order_id'];
        $result = $this->order->getDetailOrderbyID($order_id);
        echo json_encode($result);
    }

    public function setCheckOrder(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['data'])){

           foreach($requestData['data'] as $row){
                $result = $this->order->setCheckOrder($requestData['table_id'],$row['id'],$row['amount']);
            
            }
        
            echo json_encode($result);
           

        }
      
       
       
    }

    public function getOrderGroup(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['table_id'])){

          
            $result = $this->order->getOrderGroup($requestData['table_id']);
            $this->order->clearCheckOrder($requestData['table_id']);
            
            foreach($result as $row){
                $this->order->setCheckOrder($requestData['table_id'],$row->co_f_id,$row->total_amount);
            }
            
            echo json_encode($result);

        }
    }

    public function setOrderList(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['data'])){
            $microtime = microtime();
            $time = ( preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime) ); 
            $result = $this->order->setOrderList($time,$requestData['table_id']);
                 
            foreach($requestData['data'] as $row){
                $this->order->setOrderDetail($time,$row['co_f_id'],$row['total_amount']);
            }
        
            $rs = $this->order->clearCheckOrder($requestData['table_id']);
            echo json_encode($rs);

        }
       
       
    }
    public function clear(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        $rs = $this->order->clearCheckOrder($requestData['table_id']);
       
    }

    public function Incrementorder(){
        $requestData = json_decode(file_get_contents('php://input'), true);

        if(isset($requestData['table_id']) && isset($requestData['f_id']) && isset($requestData['amount'])){
            $this->order->Incrementorder($requestData['table_id'],$requestData['f_id'],$requestData['amount']);
        }
    }

    public function deletemenu(){
        $requestData = json_decode(file_get_contents('php://input'), true);

        if(isset($requestData['table_id']) && isset($requestData['f_id'])){
            $this->order->deletemenu($requestData['table_id'],$requestData['f_id']);
        }
    }

    public function confirmorder(){
        $requestData = json_decode(file_get_contents('php://input'), true);

        if(isset($requestData['order_id'])){
            $result = $this->order->confirmorder($requestData['order_id']);
            echo json_encode($result);
        }
    }

    public function getNumberOrder(){
        $requestData = json_decode(file_get_contents('php://input'), true);

        if(isset($requestData['order_id'])){
            $result = $this->order->getNumberOrder($requestData['order_id']);
            echo json_encode($result);
        }
    }

    public function changeStatusOrderDetail(){
        $requestData = json_decode(file_get_contents('php://input'), true);

        if(isset($requestData['order_id']) && isset($requestData['f_id'])){
            $result = $this->order->changeStatusOrderDetail($requestData['order_id'],$requestData['f_id']);
            echo json_encode($result);
        }
    }

    public function getDateOrder(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['date'])){
        $result = $this->order->getDateOrder($requestData['date']);
        echo json_encode($result);
        }
    }

    public function checkOrderBeforeCheckBill(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        $rs = $this->order->checkOrderBeforeCheckBill($requestData['table_id']);
        echo json_encode($rs);
    }
}
?>