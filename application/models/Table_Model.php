<?php
class Table_Model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function getAllTable(){
        $sql = "select * FROM tableland where t_status = 'ready'";
        $result = $this->db->query($sql);
    
        $rs = [
            'data' => $result->result()
            ];
        return $rs;
    }

    public function getTable(){
        $sql = "select * FROM tableland ";
        $result = $this->db->query($sql);
    
        $rs = [
            'data' => $result->result()
            ];
        return $rs;
    }
}
?>