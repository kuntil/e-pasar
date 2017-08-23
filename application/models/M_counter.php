<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_counter extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function get_all_count($product_id)
    {
        $sql = "SELECT COUNT(*) as tol_records FROM counter_tbl WHERE product_id = '$product_id'";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
	
	public function get($ip,$user_agent,$product_id,$date)
    {
        $sql = "SELECT COUNT(*) as tol_records FROM counter_tbl 
				WHERE ip = '".$ip."'
				AND user_agent = '".$user_agent."'
				AND product_id = '".$product_id."'
				AND date = '".$date."'
				";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
	
    public function insert($data) {	
		 //insert data
		 $this->db->insert('counter_tbl', $data);
    }
	
}
?>