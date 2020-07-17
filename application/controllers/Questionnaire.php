<?php
class Questionnaire extends CI_Controller{

    public function __construct(){
       
        parent::__construct();
        $this->load->model('Questionnaire_Model','Ques');
		 header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:GET, POST ,OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        
    }
    

    public function setQuestionnaire(){
   
        $requestData = json_decode(file_get_contents('php://input'), true);
        $d1 = $requestData['d1'];
        $d2 = $requestData['d2'];
        $d3 = $requestData['d3'];
        $d4 = $requestData['d4'];
        $d5 = $requestData['d5'];
        $d6 = $requestData['d6'];
        $d7 = $requestData['d7'];
        $d8 = $requestData['d8'];
        $d9 = $requestData['d9'];
        $d10 = $requestData['d10'];
        $d11 = $requestData['d11'];
        $d12 = $requestData['d12'];
        $d13 = $requestData['d13'];
        $d14 = $requestData['d14'];
        $result = $this->Ques->setQuestionnaire($d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14);
        echo json_encode($result);
    
    }

    

}
?>