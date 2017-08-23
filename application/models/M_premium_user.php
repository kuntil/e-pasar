<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_premium_user extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function get_toko($id) {
		$query  = $this->db->query("SELECT * FROM premium_user_tbl WHERE store_id='$id'");
        return $query->result();
    }
    
    public function get_toko_bukti_transfer_bronze($id) {
    	$query  = $this->db->query("SELECT * FROM premium_user_tbl WHERE store_id='$id' and tipe_premium='3' and bukti_transfer =''");
    	return $query->result();
    }    
        
    public function get_toko_bukti_transfer_silver($id) {
    	$query  = $this->db->query("SELECT * FROM premium_user_tbl WHERE store_id='$id' and tipe_premium='2' and bukti_transfer =''");
    	return $query->result();
    }
    
    public function get_toko_bukti_transfer_gold($id) {
    	$query  = $this->db->query("SELECT * FROM premium_user_tbl WHERE store_id='$id' and tipe_premium='1' and bukti_transfer =''");
    	return $query->result();
    }
    
    public function get_rekening($id) {
    	$query  = $this->db->query("SELECT * FROM bank_account_tbl WHERE store_id='$id'");
    	return $query->result();
    }
    
    public function get_toko_aktif($id) {
    	$query  = $this->db->query("SELECT * FROM premium_user_tbl WHERE store_id='$id' and aktif='y'");
    	return $query->result();
    }
    
    public function get_toko_belum_aktif ($id){
    	$query  = $this->db->query("SELECT * FROM premium_user_tbl WHERE store_id='$id' and aktif='t' and bukti_transfer IS NOT NULL");
    	return $query->result();    	
    }
    	
	
	public function get($id) {
        $this->db->where('qid', $id);
        $query = $this->db->get('store_tbl', 1);
        return $query->result_array();
    }

    public function insert($data) {	
        $this->db->insert('premium_user_tbl', $data);
    }

    public function update($data) {
    	$this->db->update ('premium_user_tbl', $data, array ('store_id' => $data['store_id']));
    }
    
	
}
?>