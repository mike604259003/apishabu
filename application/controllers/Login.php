<?php
class Login extends CI_Controller{

    public function __construct(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:GET, POST ,OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        parent::__construct();
        $this->load->model('User_Model','user');
		
        
    }
    

    public function checkLogin(){
   
        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['username']) && isset($requestData['password'])){
        
        $user = $requestData['username'];
        $pass = $requestData['password'];
        $decodepass=  sha1(md5($pass));
     
    
        $result = $this->user->searchuserlogin($user,$decodepass);
        echo json_encode($result);
        }else{
        echo 0;
        }
    }

    public function reset(){
   
        $requestData = json_decode(file_get_contents('php://input'), true);
        if(isset($requestData['password'])){
        
        $user = 'reset';
        $pass = $requestData['password'];
        $decodepass=  sha1(md5($pass));
     
    
        $result = $this->user->searchuserlogin($user,$decodepass);
        echo json_encode($result);
        }else{
        echo 0;
        }
    }

    public function register(){
        
        $requestData = json_decode(file_get_contents('php://input'), true);
        
      
        $user = $requestData['username'];
        $pass = $requestData['password'];
        $name = $requestData['name'];
        $position = $requestData['position'];
       $decodepass=  sha1(md5($pass));
     
    
        $result = $this->user->register($name,$position,$user,$decodepass);
       
        echo json_encode($result);
        
    }

   

}
?>