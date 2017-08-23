<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_comment_product extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }

// PENJUAL	
	public function record_count_comment_store($store_id) {
		return $this->db->count_all("comment_tbl a, person_tbl b, product_tbl c, address_buyer_tbl d
									WHERE a.product_id = c.product_id
									AND c.store_id = '$store_id'
									AND a.user_id = b.user_id
									AND a.user_id = d.user_id");
	}
	
	public function comment_store($limit, $start, $store_id){
		$this->db->select ('a.qid, message, b.name as buyer_name, b.image, c.name, c.desc, c.price, 
							c.qty, c.volume, c.satuan, c.image2  ');
		$this->db->from ('comment_tbl a, person_tbl b, product_tbl c');
		$this->db->where ('a.product_id = c.product_id');
		$this->db->where ('c.store_id',$store_id);
		$this->db->where ('a.user_id = b.user_id');
		$this->db->order_by ('qid DESC');
		$this->db->limit ($limit, $start);
		$query = $this->db->get ();
		if ($query->num_rows()> 0) {
			foreach ( $query->result () as $row ) {
				$data [] = $row;
			}
			return $data;
		}
		return false;
    }
	
	public function detail_comment_store($store_id, $qid){
		$this->db->select ('a.qid, message, b.name as buyer_name, b.image, c.name, c.desc, c.price, 
							c.qty, c.volume, c.satuan, c.image2  ');
		$this->db->from ('comment_tbl a, person_tbl b, product_tbl c');
		$this->db->where ('a.product_id = c.product_id');
		$this->db->where ('c.store_id',$store_id);
		$this->db->where ('a.user_id = b.user_id');
		$this->db->where ('a.qid',$qid);
		$this->db->order_by ('qid DESC');
		$query = $this->db->get ();
		if ($query->num_rows()> 0) {
			foreach ( $query->result () as $row ) {
				$data [] = $row;
			}
			return $data;
		}
		return false;
    }

	
//	PEMBELI

	public function record_count_comment_buyer($user_id) {
		return $this->db->count_all("comment_tbl a, store_tbl b, product_tbl c, address_store_tbl d
									WHERE a.product_id = c.product_id
									AND a.user_id = '$user_id'
									AND b.store_id = c.store_id
									AND b.store_id = d.store_id");
	}

	public function comment_buyer($limit, $start, $user_id){
		$this->db->select ('a.qid, message, b.name as store_name, d.desc as address, b.image, c.name, c.desc, c.price, 
							c.qty, c.volume, c.satuan, c.image2  ');
		$this->db->from ('comment_tbl a, store_tbl b, product_tbl c, address_store_tbl d');
		$this->db->where ('a.product_id = c.product_id');
		$this->db->where ('a.user_id',$user_id);
		$this->db->where ('b.store_id = c.store_id');
		$this->db->where ('b.store_id = d.store_id');
		$this->db->order_by ('qid DESC');
		$this->db->limit ($limit, $start);
		$query = $this->db->get ();
		if ($query->num_rows()> 0) {
			foreach ( $query->result () as $row ) {
				$data [] = $row;
			}
			return $data;
		}
		return false;
    }
	
	public function detail_comment_buyer($user_id, $qid){
		$this->db->select ('a.qid, message, b.name as buyer_name, b.image, c.name, c.desc, c.price, 
							c.qty, c.volume, c.satuan, c.image2  ');
		$this->db->from ('comment_tbl a, person_tbl b, product_tbl c');
		$this->db->where ('a.product_id = c.product_id');
		$this->db->where ('a.user_id',$user_id);
		$this->db->where ('a.user_id = b.user_id');
		$this->db->where ('a.qid',$qid);
		$this->db->order_by ('qid DESC');
		$query = $this->db->get ();
		if ($query->num_rows()> 0) {
			foreach ( $query->result () as $row ) {
				$data [] = $row;
			}
			return $data;
		}
		return false;
    }
	
	public function record_count($product_id) {
		return $this->db->count_all("comment_tbl a, person_tbl b
									WHERE product_id = '$product_id'
									AND a.user_id = b.user_id");
	}
	
	public function record_count_like_comment($id) {
        $this->db->where('qid', $id);
        $query = $this->db->get('comment_tbl', 1);
        return $query->result_array();
    }
	
	public function get($position, $item_per_page, $product_id){
    	$query  = $this->db->query("SELECT a.qid, message, b.name as buyer_name, image  
									FROM comment_tbl a, person_tbl b
									WHERE product_id = '$product_id'
									AND a.user_id = b.user_id
									ORDER BY qid DESC LIMIT $position, $item_per_page");
    	return $query->result();
    }
	
	public function insert($data) {	
	    $this->db->insert('comment_tbl', $data);
    }
	
	 public function update($data) {
		$this->db->update ('comment_tbl', $data, array ('qid' => $data['qid']));
    }
	
	public function delete($id) {
        $this->db->delete('comment_tbl', array('qid' => $id));
    }
	
	
}
?>