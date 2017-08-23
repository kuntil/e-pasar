<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wishlist extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function get_all_content_wishlist() {
        $query  = $this->db->query("SELECT * FROM product_tbl a, wishlist_tbl b 
									WHERE a.product_id = b.product_id");
        return $query->result();
    }
	
	public function get_all_content_wishlist_result($page_position, $item_per_page, $id) {
        $query  = $this->db->query("SELECT a.*, b.name as store_name, c.desa 
									FROM  product_tbl a, store_tbl b, address_store_tbl c,  wishlist_tbl d
									WHERE a.store_id = b.store_id
									AND a.store_id = c.store_id
									AND b.store_id = c.store_id
									AND a.product_id = d.product_id 
									AND d.user_id = '$id'
									LIMIT $page_position, $item_per_page");
        return $query->result();
    }
	
	public function wishlist_product($id_product, $id){
    	$query  = $this->db->query("SELECT * FROM wishlist_tbl WHERE product_id='$id_product' AND user_id='$id'");
    	return $query->result();
    }
	
    public function insert($data) {	
		 //insert data
        $this->db->insert('wishlist_tbl', $data);
    }
	
	public function delete($id) {
        $this->db->delete('wishlist_tbl', array('product_id' => $id, 'user_id' => $this->session->userdata('user_id')));
    }
	
	
}
?>