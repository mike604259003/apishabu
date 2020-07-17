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
            echo json_decode($rs);
        }else{
            echo "ไม่มีข้อมูล โต๊ะ และจำนวนคน";
        }
    }

   
    

   

}
?>