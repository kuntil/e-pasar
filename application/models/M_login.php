<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function login($data) {
        $this->db->select('a.*, year(create_date) as year, month(create_date) as month');
        $this->db->from('user_tbl a');
        $this->db->where('a.username', $data['username']);
        $this->db->where('a.password', $data['password']);
        $this->db->where('a.status', 1);
        return $this->db->get()->row();
    }
	
    public function update($data, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('user_tbl', $data);
    }
	
	public function last_login($data) {
	
		$this->db->update('user_tbl', $data, array('user_id'=>$this->session->userdata('user_id')));
    }
	
}
?>