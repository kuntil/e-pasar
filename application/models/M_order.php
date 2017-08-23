<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }

// PENJUAL	
	public function my_list_order_store($id) {
        $query  = $this->db->query("SELECT a.product_id, a.name, a.desc, a.price, a.qty, a.volume, a.satuan, a.store_id, a.image2,
									b.total, b.order_id, b.qty as qty_order, b.qid as qid_order, b.date, b.qid, b.user_id,
									c.name as buyer_name, c.nohp, d.desc as address 
									FROM product_tbl a, order_tbl b, person_tbl c, address_buyer_tbl d
									WHERE b.store_id='$id'
									AND b.status = '1'
									AND a.product_id = b.product_id
									AND c.user_id = b.user_id
									AND c.user_id = d.user_id
									AND b.user_id = d.user_id
									");
        return $query->result();
    }

// PEMBELI	
	public function order_buyer($id) {
        $query  = $this->db->query("SELECT b.order_id, b.store_id, CAST(b.date AS DATE) as date, c.name AS store_name, c.user_id, c.nohp, d.desc AS address, d.desa, c.image
									FROM product_tbl a, order_tbl b, store_tbl c, address_store_tbl d
									WHERE a.product_id = b.product_id 
									AND b.status = 1 
									AND a.store_id = b.store_id 
									AND a.store_id = c.store_id 
									AND a.store_id = d.store_id
									AND b.user_id = '$id'
									GROUP BY order_id");
        return $query->result();
    }
	
	public function detail_order_buyer($order_id,$id) {
        $query  = $this->db->query("SELECT a.product_id, b.order_id, a.name, a.desc, a.price, a.qty, a.volume, a.satuan, a.store_id, a.image2, 
									b.total, b.qty AS qty_order, b.qid AS qid_order, b.date, b.qid, b.user_id, 
									c.name AS buyer_name, c.nohp, d.desc AS address, d.desa
									FROM product_tbl a, order_tbl b, store_tbl c, address_store_tbl d
									WHERE a.product_id = b.product_id 
									AND b.status = 1
									AND b.order_id = '$order_id'
									AND a.store_id = b.store_id 
									AND a.store_id = c.store_id 
									AND a.store_id = d.store_id 
									AND b.user_id = $id;
									
									");
        return $query->result();
    }
	
	public function order_process_buyer($id) {
        $query  = $this->db->query("SELECT b.*, CAST(b.date AS DATE) as date2, c.name AS store_name, b.user_id, c.nohp, d.desc AS address, d.desa, c.image	
									FROM product_tbl a, order_tbl b, store_tbl c, address_store_tbl d 
									WHERE a.product_id = b.product_id 
									AND b.status = 2 
									AND a.store_id = b.store_id 
									AND a.store_id = c.store_id 
									AND a.store_id = d.store_id
									AND b.user_id = '$id'
									GROUP BY order_id;
									
									");
        return $query->result();
    }
	
	public function detail_order_process_buyer($order_id,$id) {
        $query  = $this->db->query("SELECT a.product_id, b.order_id, a.name, a.desc, a.price, a.qty, a.volume, a.satuan, a.store_id, a.image2, 
									b.total, b.qty AS qty_order, b.qid AS qid_order, b.date, b.qid, b.user_id, 
									c.name AS buyer_name, c.nohp, d.desc AS address, d.desa
									FROM product_tbl a, order_tbl b, store_tbl c, address_store_tbl d
									WHERE a.product_id = b.product_id 
									AND b.status = 2
									AND b.order_id = '$order_id'
									AND a.store_id = b.store_id 
									AND a.store_id = c.store_id 
									AND a.store_id = d.store_id 
									AND b.user_id = $id;
									
									");
        return $query->result();
    }
	
	public function transaction_success_buyer($order_id,$id) {
        $query  = $this->db->query("SELECT a.product_id, b.order_id, a.name, a.desc, a.price, a.qty, a.volume, a.satuan, a.store_id, a.image2, 
									b.total, b.qty AS qty_order, b.qid AS qid_order, b.date, b.qid, b.user_id, 
									c.name AS buyer_name, c.nohp, d.desc AS address, d.desa
									FROM product_tbl a, order_tbl b, store_tbl c, address_store_tbl d
									WHERE a.product_id = b.product_id 
									AND b.status = 3
									AND b.order_id = '$order_id'
									AND a.store_id = b.store_id 
									AND a.store_id = c.store_id 
									AND a.store_id = d.store_id 
									AND b.user_id = $id;
									
									");
        return $query->result();
    }
	
	public function transaction_cancel_buyer($order_id,$id) {
        $query  = $this->db->query("SELECT a.product_id, b.order_id, a.name, a.desc, a.price, a.qty, a.volume, a.satuan, a.store_id, a.image2, 
									b.total, b.qty AS qty_order, b.qid AS qid_order, b.date, b.qid, b.user_id, 
									c.name AS buyer_name, c.nohp, d.desc AS address, d.desa
									FROM product_tbl a, order_tbl b, store_tbl c, address_store_tbl d
									WHERE a.product_id = b.product_id 
									AND b.status = 5
									AND b.order_id = '$order_id'
									AND a.store_id = b.store_id 
									AND a.store_id = c.store_id 
									AND a.store_id = d.store_id 
									AND b.user_id = $id;
									
									");
        return $query->result();
    }
	
	 public function insert($data) {	
		 //insert data
        $this->db->insert('order_tbl', $data);
    }
	
	 public function update($data) {
		$this->db->update ( 'order_tbl', $data, array ('order_id' => $data['order_id']));
    }
	
	public function delete($id, $user_id) {
        $this->db->delete('order_tbl', array('qid' => $id, 'user_id' => $user_id));
    }
	
}
?>