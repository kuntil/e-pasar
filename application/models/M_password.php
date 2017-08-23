<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_password extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function last(){
    	$query  = $this->db->query("SELECT user_id FROM user_tbl order by user_id DESC LIMIT 1");
    	return $query->result();
    }
	
	public function fetchById(){
		$this->db->select ('*');
		$this->db->from ('user_tbl');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$query = $this->db->get()->result_array();
		return $query;
	}
	
    /*public function insert($data) {
        $this->db->insert('user_tbl', $data);
    }*/
	
	public function update($data) {
		$this->db->update ('user_tbl', $data, array ('user_id' => $this->session->userdata('user_id')));
    }
    
	
	
}
?>