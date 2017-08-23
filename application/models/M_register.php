<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function last(){
    	$query  = $this->db->query("SELECT user_id FROM user_tbl order by user_id DESC LIMIT 1");
    	return $query->result();
    }
	
	public function get_email($email) {
        $query  = $this->db->query("SELECT * FROM user_tbl WHERE email = '$email'");
        return $query->result();
    }
	
    public function insert($data) {
        $this->db->insert('user_tbl', $data);
    }
	
	function changeActiveState($key){
			$data = array(
               'status' => 1
            );

			$this->db->where('md5(user_id)', $key);
			$this->db->update('user_tbl', $data);

			return true;
	}
    
	
}
?>