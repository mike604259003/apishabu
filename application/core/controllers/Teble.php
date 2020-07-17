<?php
class Teble extends CI_Controller{

    public function __construct(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:GET, POST ,OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        parent::__construct();
        $this->load->model('Table_Model','tableland');
		
        
    }
    

    public function getAllTeble(){
        $result = $this->tableland->getAllTeble();
        echo json_encode($result);
    }
   
    

   

}
?>