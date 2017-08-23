<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invoice extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }

// PEMBELI	
	public function list_order_buyer($order_id) {
        $query  = $this->db->query("SELECT *,a.qty as qty_order, CAST(a.date AS DATE) as tanggal
									FROM order_tbl a, product_tbl b 
									WHERE a.product_id = b.product_id
									AND order_id = '$order_id'
									");
        return $query->result();
    }
		
	public function store($store_id) {
        $query  = $this->db->query("SELECT a.*, b.desc as address
									FROM store_tbl a, address_store_tbl b 
									WHERE a.store_id = b.store_id
									AND a.store_id = '$store_id'
									");
        return $query->result();
    }
		
	public function user($user_id) {
        $query  = $this->db->query("SELECT a.*, b.desc as address
									FROM person_tbl a, address_buyer_tbl b 
									WHERE a.user_id = b.user_id
									AND a.user_id = '$user_id'
									");
        return $query->result();
    }
	
}
?>