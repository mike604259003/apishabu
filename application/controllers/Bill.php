<?php
class Bill extends CI_Controller{

    public function __construct(){

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:GET, POST ,OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        parent::__construct();
        $this->load->model('Bill_Model','bill');
		
        
    }
    

    public function openBill(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        if($requestData['amount'] && $requestData['table']){
        $rs = $this->bill->openBill($requestData['table'],$requestData['amount']);
            echo json_encode($rs);
        }else{
            echo "ไม่มีข้อมูล โต๊ะ และจำนวนคน";
        }
    }

    public function updatepeople(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        if($requestData['amount'] && $requestData['bill']){
           $this->bill->updatepeople($requestData['bill'],$requestData['amount']);
        }
    }

   public function getAllBill(){
    $rs = $this->bill->getAllBill();
    echo json_encode($rs);
   }

   public function getBillByID(){
  
    $requestData = json_decode(file_get_contents('php://input'), true);
    $rs = $this->bill->getBillByID($requestData['bill_id']);
    $date = "";
    foreach($rs as $row ){
        $date = $row->b_date;
    }
    $pieces = explode(" ", $date);
    $datenew = date("d-m-Y",strtotime($date));

    $data = [
        'data' => $rs,
        'date' => $datenew,
        'time' => $pieces[1]
    ];
    echo json_encode($data);
   }

   public function checkStatusBill(){
    $requestData = json_decode(file_get_contents('php://input'), true);
    $bill_id = $requestData['bill_id'];
    $rs = $this->bill->checkStatusBill($bill_id);
    echo json_encode($rs);
   }

   public function changeStatusBill1(){
        $requestData = json_decode(file_get_contents('php://input'), true);
        $bill_id = $requestData['bill_id'];
        $rs = $this->bill->changeStatusBill1($bill_id);
        echo json_encode($rs);
   }

   public function changeStatusBill2(){
    $requestData = json_decode(file_get_contents('php://input'), true);
    $bill_id = $requestData['bill_id'];
    $rs = $this->bill->changeStatusBill2($bill_id);
    echo json_encode($rs);
}

   public function getBillStatusMakepayment(){
    $rs = $this->bill->getBillStatusMakepayment();
   
    echo json_encode($rs);
   }

   public function getBillStatusMakepaymentDate(){
    $requestData = json_decode(file_get_contents('php://input'), true);
    $date = $requestData['date'];
    $rs = $this->bill->getBillStatusMakepaymentDate($date);
    echo json_encode($rs);
   }

   public function changeStatusQuestion(){
    $requestData = json_decode(file_get_contents('php://input'), true);
    $bill = $requestData['bill'];
    $rs = $this->bill->changeStatusQuestion($bill);
    echo json_encode($rs);
   }
    
    

   

}
?>