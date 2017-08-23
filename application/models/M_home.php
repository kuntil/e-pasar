<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
    public function get_by_cookie($cookie)
    {
        $this->db->where('cookie', $cookie);
        return $this->db->get('user_tbl');
    }
    
	public function get_store(){
		$this->db->select ('*');
		$this->db->from ('store_tbl');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	public function get_address_store($store_id){
		$this->db->select ('*');
		$this->db->from ('address_store_tbl');
		$this->db->where('store_id',$store_id);
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	public function get_address_buyer(){
		$this->db->select ('*');
		$this->db->from ('address_buyer_tbl');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	public function get_person(){
		$this->db->select ('*');
		$this->db->from ('person_tbl');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$query = $this->db->get();
		return $query->result();
	}
	
	public function user_store($id){
        $this->db->where('user_id', $id);
        $query = $this->db->get('store_tbl', 1);
        return $query->result();
    }
    
	public function user_profile($id){
        $this->db->where('user_id', $id);
        $query = $this->db->get('person_tbl', 1);
        return $query->result();
    }
    
	public function count_order($id) {
		$this->db->select('a.*, b.addres_delivery, b.store_id, c.name, c.price, c.image1, e.name as name_person');
		$this->db->from('order_tbl a, order_detail_tbl b, product_tbl c, store_tbl d, person_tbl e');
		$this->db->where('a.order_id = b.order_id');
		$this->db->where('b.product_id = c.product_id');
		$this->db->where('b.store_id = d.store_id');
		$this->db->where('a.user_id = e.user_id');
		$this->db->where('date(a.order_date) = curdate()');
		$this->db->where('d.store_id', $id );
        $query  = $this->db->get();
        return $query->result();
    }
	
	public function count_received($id) {
		$this->db->select('a.*, b.addres_delivery, c.name, c.price, c.image1, e.name as name_person');
		$this->db->from('order_tbl a, order_detail_tbl b, product_tbl c, store_tbl d, person_tbl e');
		$this->db->where('a.order_id = b.order_id');
		$this->db->where('b.product_id = c.product_id');
		$this->db->where('b.store_id = d.store_id');
		$this->db->where('a.user_id = e.user_id');
		$this->db->where('date(a.order_date) = curdate()');
		$this->db->where('d.store_id', $id );
		$this->db->where('a.status', 4);
        $query  = $this->db->get();
        return $query->result();
    }
	
	public function count_cancel($id) {
		$this->db->select('a.*, b.addres_delivery, c.name, c.price, c.image1, e.name as name_person');
		$this->db->from('order_tbl a, order_detail_tbl b, product_tbl c, store_tbl d, person_tbl e');
		$this->db->where('a.order_id = b.order_id');
		$this->db->where('b.product_id = c.product_id');
		$this->db->where('b.store_id = d.store_id');
		$this->db->where('a.user_id = e.user_id');
		$this->db->where('date(a.order_date) = curdate()');
		$this->db->where('d.store_id', $id );
		$this->db->where('a.status', 5);
        $query  = $this->db->get();
        return $query->result();
    }
	
}
?>