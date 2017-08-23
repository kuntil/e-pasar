<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transfer extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
// PENJUAL
	public function transfer($id) {
        $query  = $this->db->query("SELECT b.*, c.name as buyer_name,  c.nohp, d.desc as address, e.name AS store_name, e.image  
									FROM transfer_tbl b, person_tbl c, address_buyer_tbl d, store_tbl e
									WHERE b.store_id='$id'
									AND b.store_id = e.store_id
									AND c.user_id = b.user_id
									AND c.user_id = d.user_id
									AND b.user_id = d.user_id
									");
        return $query->result();
    }
	
	public function my_list_order_store($id,$qid) {
        $query  = $this->db->query("SELECT b.*, c.name as buyer_name,  c.nohp, d.desc as address, e.name AS store_name, e.image  
									FROM transfer_tbl b, person_tbl c, address_buyer_tbl d, store_tbl e
									WHERE b.store_id='$id'
									AND c.user_id = b.user_id
									AND c.user_id = d.user_id
									AND b.user_id = d.user_id
									AND b.qid = $qid
									");
        return $query->result();
    }
	
// PEMBELI
	public function my_list_order_buyer($id,$order_id) {
        $query  = $this->db->query("SELECT b.*, c.name AS buyer_name, d.desc AS address, d.desa
									FROM transfer_tbl b, store_tbl c, address_store_tbl d
									WHERE b.store_id = c.store_id 
									AND b.store_id = d.store_id 
									AND b.user_id = '$id'
									AND b.order_id = '$order_id'
									");
        return $query->result();
    }
	
	public function insert($data) {	
		 //insert data
        $this->db->insert('transfer_tbl', $data);
    }
	
	public function delete($order_id, $user_id) {
        $this->db->delete('transfer_tbl', array('order_id' => $order_id, 'user_id' => $user_id));
    }
	
	
}
?>