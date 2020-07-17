<?php
class Stock extends CI_Controller{

    public function __construct(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:GET, POST ,OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        parent::__construct();
        $this->load->model('Stock_Model','stock');
		
        
    }
    

    public function loadstock(){
   
       
        $result = $this->stock->loadstock();
        echo json_encode($result);
    
    }

    

}
?>