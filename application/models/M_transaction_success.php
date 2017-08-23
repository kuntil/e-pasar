<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaction_success extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }

// PENJUAL	
	public function my_list_order_store($id) {
		$query  = $this->db->query("SELECT b.*, c.name as buyer_name,  c.nohp, d.desc as address, e.name AS store_name, e.image  
									FROM transaction_success_tbl b, person_tbl c, address_buyer_tbl d, store_tbl e
									WHERE b.store_id='$id'
									AND b.store_id = e.store_id
									AND c.user_id = b.user_id
									AND c.user_id = d.user_id
									AND b.user_id = d.user_id
									");
        return $query->result();
    }

// PEMBELI	
	
	public function my_list_order_buyer($id,$order_id) {
        $query  = $this->db->query("SELECT b.*, c.name AS buyer_name, c.nohp, d.desc AS address, d.desa
									FROM transaction_success_tbl b, store_tbl c, address_store_tbl d
									WHERE b.store_id = c.store_id 
									AND b.store_id = d.store_id 
									AND b.user_id = '$id'
									AND b.order_id = '$order_id'
									");
        return $query->result();
    }
	
	public function transaction_success($id) {
        $query  = $this->db->query("SELECT b.order_id, b.qid, b.store_id, CAST(b.date AS DATE) as date2, c.name AS store_name, c.user_id, c.nohp, d.desc AS address, d.desa, c.image
									FROM product_tbl a, order_tbl b, store_tbl c, address_store_tbl d 
									WHERE a.product_id = b.product_id 
									AND b.status = 3 
									AND a.store_id = b.store_id 
									AND a.store_id = c.store_id 
									AND a.store_id = d.store_id
									AND b.user_id = '$id'
									GROUP BY order_id;
									
									");
        return $query->result();
    }
	
	public function insert($data) {	
		 //insert data
        $this->db->insert('transaction_success_tbl', $data);
    }
	
	public function delete($id, $user_id) {
        $this->db->delete('transaction_success_tbl', array('qid' => $id, 'user_id' => $user_id));
    }
	
}
?>