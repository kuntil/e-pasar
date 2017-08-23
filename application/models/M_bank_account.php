<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bank_account extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function get_account($id) {
		$query  = $this->db->query("SELECT * FROM bank_account_tbl WHERE store_id='$id'");
        return $query->result();
    }
	
	public function last(){
    	$query  = $this->db->query("SELECT account_id FROM bank_account_tbl order by account_id DESC LIMIT 1");
    	return $query->result();
    }
	
	public function get($id) {
        $this->db->where('qid', $id);
        $query = $this->db->get('bank_account_tbl', 1);
        return $query->result_array();
    }

    public function insert($data) {	
		 //insert data
        $this->db->insert('bank_account_tbl', $data);
    }

	public function update($data) {
        //update data
        $this->db->update('bank_account_tbl', $data, array('qid'=>$data['qid']));
    }
	
	public function delete($id) {
        $this->db->delete('bank_account_tbl', array('qid' => $id));
    }
	
}
?>