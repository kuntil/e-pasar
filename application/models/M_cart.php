<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function my_list_cart($id) {
        $query  = $this->db->query("SELECT * FROM product_tbl a, cart_tbl b
									WHERE b.user_id='$id'
									AND a.product_id = b.product_id");
        return $query->result();
    }
	
	public function get($id, $product_id) {
        $query  = $this->db->query("SELECT * FROM product_tbl a, cart_tbl b
									WHERE b.user_id='$id'
									AND b.product_id = '$product_id'
									AND a.product_id = b.product_id");
        return $query->result();
    }
	
	
    public function insert($data) {	
		 //insert data
        $this->db->insert('cart_tbl', $data);
    }
	
	public function delete($id) {
        $this->db->delete('cart_tbl', array('qid' => $id, 'user_id' => $this->session->userdata('user_id')));
    }
	
}
?>